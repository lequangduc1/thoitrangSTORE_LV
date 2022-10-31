<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kickthuocsanpham;
use App\Models\mausanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductSizeController extends Controller
{
    public function index(){
        try {
            $params['productSizes'] = kickthuocsanpham::orderBy('id','desc')->get();
            return view('adminPages.productsize.index',$params);

        } catch (Exception $e) {
            $params['$productSizes'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.productsize.index',$params);
        }

    }

    public function create(){
        return view('adminPages.productsize.create');
    }

    public function update($id){
        try {
            $params['productSizes'] = kickthuocsanpham::where('id',$id)->first();
            if(isset($params['productSizes'])){
                return view('adminPages.productsize.update',$params);
            }else{
                Toastr::error(`Không tìm thấy kích thước có id = $id`);
                return redirect()->route('admin.productsize.index');
            }
        } catch (Exception $e) {
            Toastr::error('lỗi khi tải trang khách hàng');
            return redirect()->route('admin.productsize.index');
        }
    }

    public function store(Request $request){
        try{
            $data = $request->input();
            $date = date(today());
            if(isset($data['id'])){
                $newProductSize = kickthuocsanpham::find($data['id']);
                $data['updated_at'] = $date;
            }else{
                $newProductSize = New kickthuocsanpham();
                $data['created_at'] = $date;
            }
            $newProductSize->fill($data);
            $newProductSize->save();
            Toastr::success('Lưu thành công');
            return redirect()->route('admin.productsize.index');

        }catch (\Exception $exception){
            Toastr::error('Lưu thất bại');
            return back();
        }
    }
}
