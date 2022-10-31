<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuanTri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use \Yoeunes\Toastr\Facades\Toastr;

class AccountController extends Controller
{

    public function index(){
        $params['allAccount'] = QuanTri::where('quyen', 2)->get();
        return view('adminPages.account.index', $params);
    }

    public function create(){
        return view('adminPages.account.create');
    }

    public function update($id){
        $data = QuanTri::where('id', $id)->first();
        if($data->quyen == 1 && Auth::guard('quantri')->quyen != 1){
            Toastr::error('Bạn không có quyền truy cập!!');
            return redirect()->route('admin.account.index');
        }

        $params['account'] = $data;

        return view('adminPages.account.update', $params);
    }

    public function store(Request $request){

        $request->validate([
            'ten'=>'required|max:255',
            'email'=>'required|max:255|email',
            'password'=>Rule::requiredIf(!isset($request->id)),
            'phone'=>'required|regex:/[0-9]{9}/'
        ],
        [
            'phone.regex'=>'Phone field must is type number phone'
        ]
        );



        try{
            $data = $request->input();
            if(isset($data['id'])){
                $account = QuanTri::where('email', $data['email'])->where('id','<>',$data['id'])->first();
            }else{
                $account = QuanTri::where('email', $data['email'])->first();
            }

            if($account){
                Toastr::error('Email đã tồn tại');
                return back();
            }

            $data['quyen'] = 2;

            if(isset($data['id'])){
                $newAccount = QuanTri::find($data['id']);
            }else{
                $newAccount = New QuanTri();
                $data['password'] = Hash::make($data['password']);
            }
            $newAccount->fill($data);
            $newAccount->save();

            Toastr::success('Lưu thành công');
            return redirect()->route('admin.account.index');

        }catch (\Exception $exception){
            Toastr::error('Lưu thất bại');
            return back();
        }
    }

}
