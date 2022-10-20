<?php

namespace App\Http\Controllers\Admin;

use App\Models\khuyenmai;

use App\Http\Controllers\Controller;
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

    public function store(Request $request){
        try{
            $checkForm = $request->id;
            $date = date(today());
            if(isset($checkForm)){
                $data = $request->input();
                $data['update_by'] = "duclq@gmail.com";
                $data['updated_at'] = $date;
                $promotion = khuyenmai::find($checkForm);
                $promotion->fill($data);
                $promotion->save();
            }else{
                $data = $request->input();
                $data['create_by'] = "duclq";
                $data['conlai'] = $request->soluong;
                $data['created_at'] = $date;
                $data['updated_at'] = null;
                $promotion = new khuyenmai();
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
}
