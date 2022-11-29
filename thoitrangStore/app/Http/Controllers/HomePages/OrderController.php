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


    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momoPayment($idOrder, $total){
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total;
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000/account/order-detail/".$idOrder;
        $ipnUrl = "http://127.0.0.1:8000/account/order-detail/".$idOrder;
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
    }

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
                'trangthai_tt'=>$data['payment_method'] == 1 ? 0 : 1,
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
            if($data['payment_method'] == 2){
                return $this->momoPayment($orderNew->id, $total);
            }
            return redirect()->route('home.account.order-detail', $orderNew->id)->with(['success'=>'Đặt hàng thành công !!']);
        }catch (\Exception $e){
            dd($e);
        }
    }
}
