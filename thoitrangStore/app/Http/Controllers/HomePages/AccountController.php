<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\Customer;
use App\Models\DonHang;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index(){
        $params['userCurrent'] = Auth::guard('customer')->user();
        return view('homePages.account.index', $params);
    }

    public function updateAccount(Request $request){
        try{
            $userCurrent = Customer::find(Auth::guard('customer')->user()->id);
            $data = $request->input();
            if(!$userCurrent){
                return redirect()->back()->withErrors(['msg'=>'Tài khoản không tồn tại']);
            }
            $userCurrent->fill($data);
            $userCurrent->save();
            return redirect()->back()->with(['msg-success'=> 'Cập nhật thành công!!']);
        }catch(\Exception $exception){
            dd($exception);
            return redirect()->back()->withErrors(['msg'=>'Cập nhật không thành công!!']);
        }
    }
    public function orderList(){
        try{
            $userCurrent = Auth::guard('customer')->user();
            $params['orderList'] = DonHang::where('makhachhang', $userCurrent->id)->get();

            return view('homePages.account.order-list', $params);
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function orderDetail($idOrder){
        try{
            $userCurrent = Auth::guard('customer')->user();
            $params['order'] = DonHang::where('id', $idOrder)->where('makhachhang', $userCurrent->id)->first();
            if(!$params['order']){
                return redirect()->back()->withErrors(['msg'=>'Đơn hàng không tồn tại']);
            }
            $params['orderDetail'] = $params['order']->orderDetail;

            return view('homePages.account.order-detail', $params);
        }catch(\Exception $exception){
            dd($exception);
        }
    }

    public function orderDestroy($idOrder){
        try{
            $order = DonHang::find($idOrder);
            if(!$order){
                return redirect()->back()->withErrors(['msg'=>'Đơn hàng không tồn tại']);
            }
            $order->trangthai_dh = 4;
            $order->save();

            //update quality san pham
            foreach ($order->orderDetail as $detail){
                $productDetail = chitietsanpham::find($detail->machitietsanpham);
                $productDetail->soluong += $detail->soluong_sp;
                $productDetail->save();
            }

            return redirect()->back();
        }catch (\Exception $exception){
            dd($exception);
        }
    }

}
