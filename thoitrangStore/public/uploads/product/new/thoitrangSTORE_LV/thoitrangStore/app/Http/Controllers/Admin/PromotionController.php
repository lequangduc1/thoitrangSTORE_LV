<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Models\khuyenmai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PromotionController extends Controller
{
    public function index()
    {
        try {
            $params['allPromotions'] = khuyenmai::orderBy('id', 'desc')->get();
            return view('adminPages.promotion.index', $params);
        } catch (Exception $e) {
            $params['allPromotions'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.promotion.index', $params);
        }
    }

    public function create()
    {
        return view('adminPages.promotion.create');
    }

    public function update($id)
    {
        try {
            $params['promotion'] = khuyenmai::where('id', $id)->first();
            if (empty($params['promotion'])) {
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
    public function store(Request $request)
    {
        try {
            $checkForm = $request->id;
            $date = date(today());
//            $validator = Validator::make($request->all(), [
//                'ten_km' => 'required',
//                'ma_km' => 'required',
//                'phantramgiam' => 'required|max:2',
//                'soluong' => 'required',
//                'conlai' => 'required',
//                'ngaybatdau_km' => 'required',
//                'ngayketthuc_km' => 'required',
//            ]);
//            dd($validator);
//            if ($validator->fails()) {
//                Toastr::error('Lưu thất bại');
//                return redirect()->route('admin.promotion.index');
//            }
            if (isset($checkForm)) {
                $data = $request->input();
                $data['update_by'] = "duclq@gmail.com";
                $data['updated_at'] = $date;
                $promotion = khuyenmai::find($checkForm); //UPDATE
                $promotion->fill($data);
                $promotion->save();
            } else {
                $data = $request->input();
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
        } catch (\Exception $exception) {
            Toastr::error('Lưu thất bại');
            return back();
        }
    }
}
