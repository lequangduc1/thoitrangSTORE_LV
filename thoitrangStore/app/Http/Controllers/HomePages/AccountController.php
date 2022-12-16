<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\Customer;
use App\Models\DonHang;
use App\Models\khachhang;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index(){
        $params['userCurrent'] = Auth::guard('customer')->user();
        return view('homePages.account.index', $params);
    }

    public function updateAccount(Request $request){
        $request->validate([
            'hovaten'=>'required',
            'sodienthoai'=>'required|digits:10|numeric',
            'diachi'=>'min:15'
        ],
        [
            'hovaten.required'=>'Họ và tên là bắt buộc',
            'sodienthoai.size'=>'Số điện thoại phải là 10 ký tự',
            'sodienthoai.numeric'=>'Số điện thoại không hợp lệ',
            'diachi.min'=>'Địa chỉ chứa ít nhất 15 ký tự và thể hiện chính xác địa chỉ giao hàng'
        ]
        );

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

    public function changePassword(){
        return view('homePages.account.change-password');
    }

    public function handleChangePassword(Request $request){
        $request->validate([
            'oldPassword'=>'required|min:8',
            'password'=>'required|min:8',
        ],[
            '*.required'=>'Phải nhập đầy đủ thông tin',
            '*.min'=>'Mật khẩu phải lớn hơn 8 ký tự'
        ]);

        try{
            $user_id = Auth::guard('customer')->user()->id;
            $user = khachhang::find($user_id);
            $isComparePassword = Hash::check($request->oldPassword, $user->password);
            if(!$isComparePassword){
                return redirect()->back()->withErrors(['error'=>'Mật khẩu cũ không đúng']);
            }

            $isConfrimPassword = $request->password === $request->repassword;
            if(!$isConfrimPassword){
                return redirect()->back()->withErrors(['error'=>'Hai mật khẩu không trùng khớp']);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with(['success'=>'Đổi mật khẩu thành công!!']);
        }catch (\Exception $exception){
            dd($exception);
        }
    }

}
