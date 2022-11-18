<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\chitietsanpham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(){
        $params['total'] = getCart()['total'];
        $params['allProductInCart'] = getCart()['allProductInCart'];
        if(count($params['allProductInCart']) < 1){
            return redirect()->route('home.cart.index')->withErrors(['mgs'=>'Chưa có sản phẩm nào trong giỏ hàng !!']);
        }
        $params['user'] = Auth::guard('customer')->user();
        return view('homePages.order.index', $params);
    }

    public function checkout(Request $request){
        try{
            $data = $request->input();
            $customer_id = Auth::guard('customer')->user()->id;
            $total = getCart()['total'];
            $allProductInCart = getCart()['allProductInCart'];

            $orderNewData = [
                "makhachhang"=>$customer_id,
                'tongtien_dh'=> $total,
                'trangthai_dh'=> 0,
                'phuongthuc_tt'=>$data['payment_method'],
                'ghichu'=>''
            ];
            $orderNew = new DonHang();
            $orderNew->fill($orderNewData);
            $orderNew->save();

            //Add Order detail
            foreach($allProductInCart as $product){
                //remove quality
                $productDetail = chitietsanpham::find($product['id']);
                $productDetail->soluong = $productDetail->soluong - $product['quality'];
                $productDetail->save();

                $orderDetailData = [
                    "madonhang"=>$orderNew->id,
                    "machitietsanpham"=>$product['id'],
                    "masanpham"=>$product['product_id'],
                    "dongia"=>$product['price'],
                    "soluong_sp"=>$product['quality']
                ];
                $orderDetailNew = new ChiTietDonHang();
                $orderDetailNew->fill($orderDetailData);
                $orderDetailNew->save();
            }

            //clear session cart
            Session::forget('cart');
            return redirect()->route('home.account.order-detail', $orderNew->id)->with(['success'=>'Đặt hàng thành công !!']);
        }catch (\Exception $e){
            dd($e);
        }
    }
}
