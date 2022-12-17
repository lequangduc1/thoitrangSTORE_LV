<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Models\khuyenmai;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\chitietsanpham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PromotionController extends Controller
{
    public function index(){
        try {
            $params['allPromotions'] = khuyenmai::orderBy('id','desc')->get();
            return view('adminPages.promotion.index',$params);
        } catch (Exception $e) {
            $params['allPromotions'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.promotion.index',$params);
        }
    }

    public function create(){
        return view('adminPages.promotion.create');
    }

    public function update($id){
        try {
            $params['promotion'] = khuyenmai::where('id', $id)->first();
            if(empty($params['promotion'])){
                Toastr::error('Không có khuyến mãi này!!!');
                return redirect()->route('admin.promotion.index');
            }
            return view('adminPages.promotion.update', $params);
        } catch (Exception $e) {
            Toastr::error('Lỗi Lấy dữ liệu');
            return redirect()->route('admin.promotion.index');
        }
    }

    // ham create - update

    /**
     *   public function postCreate($checkForm null ){}
     *   public function postUpdate($checkForm co du lieu){}
     **/
    public function store(Request $request){
        $date = date(today());
        $data = $request->validate([
            'ten_km' => 'required',
            'ma_km' => 'required',
            'phantramgiam' => 'required|max:2',
            'soluong' => 'required',
            'conlai' => 'nullable',
            'ngaybatdau_km' => 'required|date|after_or_equal:' . $date,
            'ngayketthuc_km' => 'required|date|after:ngaybatdau_km',
            'trangthai' => 'required'
        ],
        [
                'ngaybatdau_km.after_or_equal' => "Ngày bắt đầu khuyến mãi phải bắt đầu từ hôm nay trở đi",
                'ngayketthuc_km.after' => "Ngày kết thúc khuyến mãi phải lớn hơn ngày bắt đầu khuyến mãi"
        ]);
        try{
            $checkForm = $request->id;

//            dd($validator);
//            if ($validator->fails()) {
//                Toastr::error('Lưu thất bại');
//                return redirect()->route('admin.promotion.index');
//            }
            if(isset($checkForm)){
                $data['update_by'] = "duclq@gmail.com";
                $data['updated_at'] = $date;
                $promotion = khuyenmai::find($checkForm); //UPDATE
                $promotion->fill($data);
                $promotion->save();
            }else{
                $data['create_by'] = "duclq";
                $data['conlai'] = $request->soluong;
                $data['created_at'] = $date;
                $data['updated_at'] = null;
                $promotion = new khuyenmai(); //INSERT
                $promotion->fill($data);
                $promotion->save();
            }
            Toastr::success('Lưu thành công');
            return redirect()->route('admin.promotion.index');
        }catch (\Exception $exception){
            Toastr::error('Lưu thất bại');
            return back();
        }
    }

    public function destroy($id) {
        try {
            $promotion = khuyenmai::find($id);
            $checkHasOrderProduct = DonHang::where('makhuyenmai',$promotion->ma_km)->get();
            if(count($checkHasOrderProduct) == 0) {
                $promotion->delete();
                Toastr::success('Xóa khuyến mãi'.$promotion->ma_km.' thành công.');
            }
            else {
                Toastr::warning("Mã này đang được sử dụng trong đơn hàng!!!");
            }
        }
        catch (Exception $e) {
            Toastr::error("Không tìm thấy mã khuyến mãi này");
        }
        return back();
    }
}
