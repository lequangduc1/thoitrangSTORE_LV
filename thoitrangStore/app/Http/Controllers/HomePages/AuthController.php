<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePages\AuthRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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

            return redirect()->route('home.auth.login_form')->with(['login_success'=>'Đăng ký thành công !']);
        }catch (\Exception $exception){
            return redirect()->route('home.auth.register_form')->withErrors(['login_fail'=>'Có lỗi trong quá trình đăng ký']);
        }

    }

}
