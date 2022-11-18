<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\phieunhap;
use App\Models\chitietphieunhap;
use App\Models\chitietsanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ImportCouponController extends Controller
{
    public function index(){
        try {
            $params['phieunhap'] = phieunhap::orderBy('id','desc')->get();
            $params['chitietphieunhap'] = chitietphieunhap::all();
            return view('adminPages.importcoupon.index',$params);
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }

    }

    public function detail($id){
        try {
            $params['phieunhap'] = phieunhap::where('id',$id)->first();
            $params['chitietphieunhap'] = chitietphieunhap::where('idphieunhap', $id)->get();
            return view('adminPages.importcoupon.detail',$params);
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }

    }

    public function confirm(Request $request){
        echo("ádád");
//        try {
////            $params['phieunhap'] = phieunhap::where('id',$id)->first();
////            $params['chitietphieunhap'] = chitietphieunhap::where('idphieunhap', $id)->get();
////            return view('adminPages.importcoupon.detail',$params);
//        } catch (Exception $e) {
//            $params['products'] = null;
//            Toastr::error('Lỗi Lấy dữ liệu');
//            return view('adminPages.importcoupon.index',$params);
//        }

    }

}
