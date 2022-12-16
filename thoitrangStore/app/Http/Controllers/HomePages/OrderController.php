<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\chitietsanpham;
use App\Models\DonHang;
use App\Models\khachhang;
use App\Models\khuyenmai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            DB::beginTransaction();
            $data = $request->input();
            $customer_id = Auth::guard('customer')->user()->id;
            $total = getCart()['total'];
            $allProductInCart = getCart()['allProductInCart'];
//          check sale
            $total_sale = 0;
            if($data['code_sale']){
                $sale = khuyenmai::where('ma_km', $data['code_sale'])->first();
                $quality = $sale->conlai - 1;
                khuyenmai::find($sale->id)->update(['conlai'=>$quality]);
                $total_sale = ($total*$sale->phantramgiam) / 100;
            }
            $orderNewData = [
                "makhuyenmai"=>$data['code_sale'] ?? null,
                "makhachhang"=>$customer_id,
                'tongtien_dh'=> $total,
                'tongtien_km'=>$total_sale,
                'trangthai_dh'=> 0,
                'diachinhanhang'=>$data['address_order'],
                'dienthoainhanhang'=>$data['phone_order'],
                'nguoinhan'=>$data['name_order'],
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
            //send mail
            $this->sendMailConfirm($orderNew->id);
            //clear session cart
            Session::forget('cart');
            if($data['payment_method'] == 2){
                return $this->momoPayment($orderNew->id, $total_sale ? $total-$total_sale : $total);
            }

            DB::commit();
            return redirect()->route('home.account.order-detail', $orderNew->id)->with(['success'=>'Đặt hàng thành công !!']);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function checkCodeSale($code){
        try{
            $dayNow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $sale = khuyenmai::where('ma_km', $code)
                            ->where('ngaybatdau_km', '<=', $dayNow)
                            ->where('ngayketthuc_km', '>=', $dayNow)
                            ->where('conlai', '>', 0)
                            ->where('trangthai', 1)
                            ->first();
            if($sale){
                return response()->json($sale);
            }
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function sendMailConfirm($orderId){
        $orderDetail = ChiTietDonHang::where('madonhang', $orderId)->get();
        $order = DonHang::find($orderId);
        $customer = khachhang::find($order->makhachhang);
        $email_data = [
            'toEmail'=>$customer->email,
            'fromEmail'=>env('MAIL_FROM_ADDRESS'),
            'fromName'=>env('MAIL_FROM_ADDRESS'),
            'subject'=>'Order successfully',
            'orderDetail'=>$orderDetail,
            'order'=>$order
        ];

        Mail::send('email_template_order', $email_data, function($message) use ($email_data){
            $message->to($email_data['toEmail'])
                ->from($email_data['toEmail'], $email_data['fromName'])
                ->subject($email_data['subject']);
        });
    }
}
