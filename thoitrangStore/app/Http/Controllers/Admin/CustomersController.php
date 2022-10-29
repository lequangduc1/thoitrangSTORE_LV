<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\khachhang;
use App\Models\khuyenmai;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class CustomersController extends Controller
{
    public function index(){
        try {
            $params['khachhang'] = khachhang::orderBy('id', 'DESC')->get();
            return view('adminPages.customers.index',$params);
        } catch (Exception $e) {
            return redirect()->route('admin.index');
            Toastr::error('lỗi khi tải trang khách hàng');
        }
    }

    public function update($id){
        try {
            $params['khachhang'] = khachhang::where('id',$id)->first();
            return view('adminPages.customers.update',$params);
        } catch (Exception $e) {
            return redirect()->route('admin.customers.index');
            Toastr::error('lỗi khi tải trang khách hàng');
        }
    }

    public function store(Request $request){
        try{
            $checkForm = $request->id;
            $date = date(today());
            if(isset($checkForm)){
                $data = $request->input();
                $data['updated_at'] = $date;
                $promotion = khachhang::find($checkForm);
                $promotion->fill($data);
                $promotion->save();
            }
            Toastr::success('Lưu thành công');
            return redirect()->route('admin.customers.index');
        }catch (\Exception $exception){
            Toastr::error('Lưu thất bại');
            return back();
        }
    }
}
