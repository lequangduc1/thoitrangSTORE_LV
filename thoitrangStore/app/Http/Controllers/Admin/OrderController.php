<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class OrderController extends Controller
{

    public function index(){
        $params['allOrder'] = DonHang::orderby('created_at','DESC')->get();
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
            return redirect()->back();
        }catch(\Exception $e){
            dd($e);
        }
    }

}
