<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\loaisanpham;
use App\Models\mausanpham;
use App\Models\kickthuocsanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index(){
        try {
            $params['products'] = chitietsanpham::orderBy('id','desc')->get();
            return view('adminPages.products.index',$params);
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.products.index',$params);
        }

    }

    public function create(){
        try {
            $params['productColor'] = mausanpham::all();
            $params['productSize'] = kickthuocsanpham::all();
            $params['productType'] = loaisanpham::all();
            return view('adminPages.products.create',$params);
        } catch (Exception $e) {

        }
    }

    public function update($id){
        try {
            $params['productColor'] = mausanpham::all();
            $params['productSize'] = kickthuocsanpham::all();
            $params['productType'] = loaisanpham::all();
            $params['products'] = chitietsanpham::where('id',$id)->first();
            return view('adminPages.products.update',$params);
        } catch (Exception $e) {

        }
//        try {
//            $params['productColor'] = mausanpham::where('id',$id)->first();
//            if(isset($params['productColor'])){
//                return view('adminPages.productcolor.update',$params);
//            }else{
//                Toastr::error(`Không tìm thấy Loại Sản phẩm có id = $id`);
//                return redirect()->route('admin.productcolor.index');
//            }
//        } catch (Exception $e) {
//            Toastr::error('lỗi khi tải trang khách hàng');
//            return redirect()->route('admin.productcolor.index');
//        }
    }

    public function store(Request $request){
        try{
            $data = $request->input();
            $date = date(today());
            if(isset($data['id'])){
                $newProduct = sanpham::find($data['id']);
                $newProductDetail = chitietsanpham::find($data['id']);
                $data['updated_at'] = $date;
            }else{
                $newProduct = New sanpham();
                $newProductDetail = new chitietsanpham();
                $data['created_at'] = $date;
            }
            $newProduct->fill($data);
            $newProduct->save();

            $data['idsanpham'] = $newProduct->id;
            $data['soluong'] = 0;
            $data['anhsanpham'] = 'asdasdasd';
            $newProductDetail->fill($data);
            $newProductDetail->save();

            Toastr::success('Lưu thành công');
            return redirect()->route('admin.products.index');

        }catch (Exception $exception){
            dd($exception);
            Toastr::error('Lưu thất bại',$exception);
            return back();
        }
    }
}
