<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePages\AuthRequest;
use App\Models\Customer;
use App\Models\VerifyCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Psy\Util\Str;


class AuthController extends Controller
{

    public function login_form(){
        $url_previous = url()->previous();
        Session::put('url_previous', $url_previous);
        return view('homePages.auth.login');
    }

    public function register_form(){
        return view('homePages.auth.register');
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->back();
    }

    public function login(Request $request){
        $data = $request->input();
        $credentials = [
            'email'=>$data['email'],
            'password'=>$data['password']
        ];

        $account = Customer::where('email', $credentials['email'])->first();

        if(!$account){
            return redirect()->route('home.auth.login_form')->withErrors(['login_fail'=>'Email chưa được đăng ký']);
        }

        if(Auth::guard('customer')->attempt($credentials)){
            if(!$account->email_verify){
                return redirect()->route('home.auth.login_form')->withErrors(['login_fail'=>'Tài khoản chưa xác thực email!, Làm ơn hãy xác nhận tại hộp thư!']);
            }
            if($account->trangthai==1){
                $url_previous = Session::get('url_previous');
                return redirect()->to($url_previous);
            }else{
                Auth::logout();
                return redirect()->route('home.auth.login_form')->withErrors(['login_fail'=>'Tài khoản bị vô hiệu hóa']);
            }
        }
        else{
            return redirect()->route('home.auth.login_form')->withErrors(['login_fail'=>'Mật khẩu không chính xác !']);
        }

    }

    public function register(Request $request){
        try{

            $request->validate([
                'hovaten'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'sodienthoai'=>'required'
            ]);

            $account = Customer::where('email', $request->email)->first();
            if($account){
                return redirect()->route('home.auth.register_form')->withErrors(['login_fail'=>'Email đã tồn tại']);
            }

            if($request->password !== $request->repassword){
                return redirect()->route('home.auth.register_form')->withErrors(['login_fail'=>'Mật khẩu không trùng khớp !']);
            }
            $data = $request->input();
            $data['password'] = Hash::make($data['password']);
            $customer = new Customer();
            $customer->fill($data);
            $customer->save();

            $last_id = $customer->id;
            $token = $last_id.hash('sha256', \Illuminate\Support\Str::random(120));
            $verifyURL = route('home.auth.verify', ['token'=>$token, 'service'=>'Email_verification']);

            $verifyEmail = new VerifyCustomer();
            $verifyEmail->customer_id = $last_id;
            $verifyEmail->token = $token;
            $verifyEmail->save();

            $message = "Gởi <b>{{$request->hovaten}}</b>";
            $message .= "Cảm ơn bạn đã đăng ký, Bạn cần phải xác nhận để hoàn thành việc đăng ký";
            $email_data = [
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>$request->email,
                'subject'=>'Email veritication',
                'body'=>$message,
                'actionLink'=>$verifyURL
            ];

            Mail::send('email_template', $email_data, function($message) use ($email_data){
                $message->to($email_data['recipient'])
                        ->from($email_data['recipient'], $email_data['fromName'])
                        ->subject($email_data['subject']);
            });

            return redirect()->route('home.auth.login_form')->with(['login_success'=>'Đăng ký thành công, Bạn cần xác nhận email để hoàn tất, Làm ơn hãy kiểm tra email']);
        }catch (\Exception $exception){
            dd($exception);
            return redirect()->route('home.auth.register_form')->withErrors(['login_fail'=>'Có lỗi trong quá trình đăng ký']);
        }

    }

    public function verify(Request $request){
        try{
            $token = $request->token;
            $verify = VerifyCustomer::where('token', $token)->first();
            if(!$verify){
                return redirect()->route('home.auth.register_form')->withErrors(['login_fail'=>'Xác thực thất bại!']);
            }else{
                $customer = $verify->customer;
                $customer->email_verify = 1;
                $customer->save();
                return redirect()->route('home.auth.login_form')->with(['login_success'=>'Hoàn tất xác thực, Bạn có thể đăng nhập!']);
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

}
