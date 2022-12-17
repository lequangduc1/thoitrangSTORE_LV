<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitietphieunhap;
use App\Models\chitietsanpham;
use App\Models\DonHang;
use App\Models\phieunhap;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class OrderController extends Controller
{

    public function index(){
        $params['allOrder'] = DonHang::where('trangthai_dh', 0)->orderby('created_at','DESC')->get();
        $params['trangthai'] = 0;
        return view('adminPages.order.index', $params);
    }

    public function detail($id){
        try{
            $params['order'] = DonHang::find($id);
            $params['orderDetails'] = $params['order']->orderDetail;
            return view('adminPages.order.detail', $params);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function updateStatus($idOrder, $status){
        try{
            $order = DonHang::find($idOrder);
            if(!$order){
                Toastr::error('Đơn hàng không tồn tại!!');
                return redirect()->back();
            }
            $order->trangthai_dh = $status;
            if($status == 3){
                $order->trangthai_tt = 1;
            }
            $order->save();

            if($order->trangthai_dh == 4){
                //update quality san pham
                foreach ($order->orderDetail as $detail){
                    $productDetail = chitietsanpham::find($detail->machitietsanpham);
                    $productDetail->soluong += $detail->soluong_sp;
                    $productDetail->save();
                }
            }
            Toastr::success('Cập nhật trạng thái thành công!!');
            return redirect()->route('admin.order.detail', $idOrder);
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function search(Request $request){
        try {
            $trangthai = $request->trangthai;
            if($trangthai != null){
                $params['allOrder'] = DonHang::where('trangthai_dh', $trangthai)->orderby('created_at','DESC')->get();
            }
            $params['trangthai'] = $trangthai;
            return view('adminPages.order.index', $params);
        }catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.order.index',$params);
        }

    }

}
