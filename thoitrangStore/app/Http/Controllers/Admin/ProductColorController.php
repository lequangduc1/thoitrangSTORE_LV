<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaisanpham;
use App\Models\mausanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductColorController extends Controller
{
    public function index(){
        try {
            $params['productColor'] = mausanpham::orderBy('id','desc')->get();
            return view('adminPages.productcolor.index',$params);
        } catch (Exception $e) {
            $params['productColor'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.productcolor.index',$params);
        }

    }

    public function create(){
        return view('adminPages.productcolor.create');
    }

    public function update($id){
        try {
            $params['productColor'] = mausanpham::where('id',$id)->first();
            if(isset($params['productColor'])){
                return view('adminPages.productcolor.update',$params);
            }else{
                Toastr::error(`Không tìm thấy Loại Sản phẩm có id = $id`);
                return redirect()->route('admin.productcolor.index');
            }
        } catch (Exception $e) {
            Toastr::error('lỗi khi tải trang khách hàng');
            return redirect()->route('admin.productcolor.index');
        }
    }

    public function store(Request $request){
        try{
            $data = $request->input();
            $date = date(today());
            if(isset($data['id'])){
                $newProductColor = mausanpham::find($data['id']);
                $data['updated_at'] = $date;
            }else{
                $newProductColor = New mausanpham();
                $data['created_at'] = $date;
            }
            $newProductColor->fill($data);

            $newProductColor->save();

            Toastr::success('Lưu thành công');
            return redirect()->route('admin.productcolor.index');

        }catch (Exception $exception){
            Toastr::error('Lưu thất bại',$exception);
            return back();
        }
    }
}
