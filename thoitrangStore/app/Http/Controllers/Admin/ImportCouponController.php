<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\phieunhap;
use App\Models\chitietphieunhap;
use App\Models\chitietsanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ImportCouponController extends Controller
{
    public function index(){
        try {
            $params['phieunhap'] = phieunhap::where('trangthai',0)->orderBy('id','desc')->get();
            $params['chitietphieunhap'] = chitietphieunhap::all();
            $params['trangthai'] = 0;
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
        try {
            $phieunham = phieunhap::find($request->id);
            $phieunham->trangthai = $request->trangthai;
            $phieunham->save();
            if($request->trangthai == 2){
                $chitietphieunhap = chitietphieunhap::where('idphieunhap', $request->id)->get();
                foreach ($chitietphieunhap as $value){
                    $sanpham = chitietsanpham::find($value->chitietsanphams->id);
                    if($sanpham){
                        $sanpham->soluong += $value->soluongnhap;
                        $sanpham->save();
                    }
                }
            }
            Toastr::success('Duyệt phiếu nhập thành công!!');
            return redirect()->route('admin.importcoupon.index');
        } catch (Exception $e) {
            Toastr::error('duyệt phiếu nhập thất bại');
            return redirect()->back();
        }

    }

    public function create(){
        try {
            $params['sanphams'] = chitietsanpham::all();
//            $params['chitietphieunhap'] = chitietphieunhap::where('idphieunhap', $id)->get();
            return view('adminPages.importcoupon.create',$params);
//            return view('adminPages.importcoupon.create');
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }

    }

    public function search(Request $request){
        try {
            $trangthai = $request->trangthai;
            $search = $request->search;
            if($trangthai != null){
                if($search){
                    $params['phieunhap'] = phieunhap::where('trangthai',$trangthai)->where('tencuahang', 'LIKE', "%{$search}%") ->orderBy('id','desc')->get();
                }else{
                    $params['phieunhap'] = phieunhap::where('trangthai',$trangthai)->orderBy('id','desc')->get();
                }
            }
            $params['chitietphieunhap'] = chitietphieunhap::all();
            $params['trangthai'] = $trangthai;
            return view('adminPages.importcoupon.index',$params);
        }catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }

    }

}
