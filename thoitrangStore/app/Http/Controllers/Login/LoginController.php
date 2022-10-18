<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\QuanTri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form_login(){
        return view('adminPages.auth.login');
    }

    public function login(Request $request){

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        $account = QuanTri::where('email', $request->email)->first();
        if(Auth::guard('quantri')->attempt($credentials)){
            if($account->trangthai == 1){
                return redirect()->route('admin.dashboard.index');
            }else{
                Auth::logout();
                return back()->with(['login_fail'=>'Tài khoản đã bị vô hiệu hóa']);
            }
        }
        return back()->with(['login_fail'=>'Tài khoản hoặc mật khẩu không đúng !!']);
    }

    public function logout(){

        Auth::guard('quantri')->logout();

        return redirect()->route('admin.login');
    }


}
