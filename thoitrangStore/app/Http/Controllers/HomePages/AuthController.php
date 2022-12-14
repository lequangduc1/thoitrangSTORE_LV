<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePages\AuthRequest;
use App\Models\Customer;
use App\Models\VerifyCustomer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Psy\Util\Str;


class AuthController extends Controller
{

    public function login_form(){
        $url_previous = url()->previous();
        if(strpos($url_previous, 'auth')){
            $url_previous = 'http://127.0.0.1:8000';
        }
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
                if($url_previous === 'http://127.0.0.1:8000/auth'){
                    return redirect()->to('http://127.0.0.1:8000');
                }
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

            $request->validate([
                'hovaten'=> 'required',
                'email'=>'required',
                'password'=>'required|min:8',
                'sodienthoai'=>'required|numeric'
            ],[
                'hovaten.required'=>'Họ và tên là bắt buộc',
                'email.required'=>'Email là bắt buộc',
                'password.min'=>'Mật khẩu phải có nhiều hơn hoặc bằng 8 ký tự',
                'sodienthoai.required'=>'Số điện thoại là bắt buộc',
                'sodienthoai.numeric'=>'Số điện thoại phải là số'

            ]);
            if(strlen($request->sodienthoai) != 10){
                return redirect()->back()->withErrors(['login_fail'=>'Số điện thoại phải là 11 ký tự']);
            }

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

    public function forgetForm(){
        return view('homePages.auth.forget');
    }

    public function forget(Request $request){
        $customer = Customer::where('email', $request->email)->first();
        if(!$customer){
            return redirect()->back()->withErrors(['error'=>'Email chưa được đăng ký']);
        }
        $id = $customer->id;
        $token = $id.hash('sha256', \Illuminate\Support\Str::random(120));
        $verifyURL = route('home.auth.form_reset_password', ['email'=>$request->email,'token'=>$token, 'service'=>'Email_verification']);

        $update = Customer::find($id);
        $update->remember_token = $token;
        $update->save();

        $message = "Gởi <b>{{$customer->hovaten}}</b>";
        $message .= "Bạn quên mật khẩu của mình, Hãy sử dụng liên kết để đặt lại mật khẩu";
        $email_data = [
            'recipient'=>$request->email,
            'fromEmail'=>$request->email,
            'fromName'=>$request->email,
            'subject'=>'Đổi mật khẩu',
            'body'=>$message,
            'actionLink'=>$verifyURL
        ];

        Mail::send('email_template_reset_password', $email_data, function($message) use ($email_data){
            $message->to($email_data['recipient'])
                ->from($email_data['recipient'], $email_data['fromName'])
                ->subject($email_data['subject']);
        });


        return redirect()->back()->with(['forget_success'=>'Kiểm tra email để lấy lại mật khẩu']);

    }

    public function formResetPassword(Request $request){
        $params['email'] = $request->email;
        return view('homePages.auth.reset_password', $params);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password'=>'required|min:8'
        ],[
            'password.required'=>'Password là bắt buôc',
            'password.min'=>'Password phải nhiều hơn hoặc bằng 8 ký tự'
        ]);

        $email = $request->email;
        $password = $request->password;
        $repassword = $request->repassword;


        if($password !== $repassword){
            return redirect()->back()->withErrors(['login_fail'=>'Mật khẩu không trùng khớp']);
        }

        $update = Customer::where('email', $email)->first();
        $update->password =  Hash::make($password);
        return redirect()->route('home.auth.login_form')->with(['login_success'=>'Lấy lại mật khẩu thành công!']);

    }

}
