<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\phieunhap;
use App\Models\chitietphieunhap;
use App\Models\chitietsanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
//            dd(Session::get('cartImport'));

            $params['allProductInCart'] = getCartImport()['allProductInCartImport'];
            $params['sanphams'] = chitietsanpham::all();
//            dd(   $params['sanphams']);
            $params['sanPhamDonHang'] = [];
//            dd( $params['allProductInCart']);
//            $params['chitietphieunhap'] = chitietphieunhap::where('idphieunhap', $id)->get();
            return view('adminPages.importcoupon.create',$params);
//            return view('adminPages.importcoupon.create');
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }
    }


    public function postCreate(Request $request){
        try {
            $params['allProductInCart'] = getCartImport()['allProductInCartImport'];
            $date = date(today());
            $tongtien = 0;
            foreach ($params['allProductInCart'] as $value){
                $tongtien += $value['gianhp']*$value['soluongnhap'];
            }
            $importCoupon = New phieunhap();
            $importCoupon->tongtien = $tongtien;
            $importCoupon->tencuahang = $request->tencuahang;
            $importCoupon->trangthai = 0;
            $importCoupon->created_at = $date;
            $importCoupon->save();

            foreach ($params['allProductInCart'] as $value){
                $importCoupondetail = New chitietphieunhap();
                $importCoupondetail->idphieunhap =  $importCoupon->id;
                $importCoupondetail->idchitietsanpham =  $value['idsanpham'];
                $importCoupondetail->soluongnhap =  $value['soluongnhap'];
                $importCoupondetail->gianhap =  $value['gianhp'];
                $importCoupondetail->created_at =  $date;
                $importCoupondetail->save();
            }
            Session::forget('cartImport');
            Toastr::success('Tạo đơn thành công!!');
            return redirect()->route('admin.importcoupon.index');
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.importcoupon.index',$params);
        }
    }

    public function  addToCart(Request $request){
        $productId = $request->idsanpham;
        try{
            $productInformation = chitietsanpham::join('sanpham', 'chitietsanpham.id', '=', 'sanpham.id')
                ->where('sanpham.trangthai', 1)
                ->where('sanpham.id', $productId)
                ->first();
            $sessionCurrent = Session::get('cartImport') ?? array();
            if(array_key_exists('product_'.$productId, $sessionCurrent)){
                $sessionCurrent['product_'.$productId]['soluongnhap'] += $request->soluongnhap;
                $sessionCurrent['product_'.$productId]['gianhp'] = $request->gianhap;
                Session::push('cartImport',$sessionCurrent);
            }else{
                $productNew = [
                    'id'=> $productInformation->id,
                    'idsanpham'=>$productInformation->idsanpham,
                    'tensanp0ham' =>$productInformation->ten_sp,
                    'soluongnhap'=>$request->soluongnhap,
                    'gianhp'=>$request->gianhap,
                ];

                $sessionCurrent['product_'.$productId] = $productNew;
                Session::push('cartImport',$sessionCurrent);
            }
            Session::put('cartImport', $sessionCurrent);
            Toastr::success('Thêm sản phẩm thành công');
            return redirect()->back();
        }catch (\Exception $e){
            Toastr::error('Thêm sản phẩm thất bại');
            return redirect()->back();
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
    public function removeCart($productId){
        try{
            $sessionCurrent = Session::get('cartImport') ?? array();
            if(array_key_exists('product_'.$productId, $sessionCurrent)){
                unset($sessionCurrent['product_'.$productId]);
                Session::put('cartImport', $sessionCurrent);
                return redirect()->back();
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

}
