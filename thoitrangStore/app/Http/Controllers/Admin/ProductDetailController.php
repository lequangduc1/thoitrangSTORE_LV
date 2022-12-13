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

class ProductDetailController extends Controller
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
            $params['productMaster'] = sanpham::all();
            $params['productColor'] = mausanpham::all();
            $params['productSize'] = kickthuocsanpham::all();
            return view('adminPages.products.create',$params);
        } catch (Exception $e) {

        }
    }

    public function update($id){
        try {
            $params['productMaster'] = sanpham::all();
            $params['productColor'] = mausanpham::all();
            $params['productSize'] = kickthuocsanpham::all();
            $params['products'] = chitietsanpham::where('id',$id)->first();
            return view('adminPages.products.update',$params);
        } catch (Exception $e) {

        }
    }

    public function store(Request $request){
        try{
            $data = $request->input();
            if(isset($data['id'])){
                $optionProduct = chitietsanpham::find($data['id']);
            }
            else {
                $optionProduct = new chitietsanpham();
            }

            if(isset($data['idsanpham'])) {
                $masterProduct = sanpham::find($data['idsanpham']);
                if($masterProduct != null) {
                    $optionProduct->idsanpham = $data['idsanpham'];
                }
                else {
                    Toastr::warning('Không tìm thấy sản phẩm chủ thể');
                }
            }
            if(isset($data['idmau'])) {
                $optionProduct->idmau = $data['idmau'];
            }
            if(isset($data['idsize'])) {
                $optionProduct->idsize = $data['idsize'];
            }
            if(isset($data['soluong'])) {
                $optionProduct->soluong = $data['soluong'];
            }
            if(isset($data['giasanpham'])) {
                $optionProduct->giasanpham = $data['giasanpham'];
            }
            if(isset($data['trangthai'])) {
                $optionProduct->trangthai = $data['trangthai'];
            }

                // xử lí lưu ảnh
                if($request->file('anhsanpham')){
                    $file = $request->file('anhsanpham');
                    $fileName = time().$file->getClientOriginalName();
                    $file->move(public_path('uploads/product'), $fileName);
                    $optionProduct->anhsanpham = 'uploads/product/'.$fileName;
                }
                $optionProduct->save();

                if(isset($data['id'])) {
                    Toastr::success('Lưu thông tin sản phẩm biến thể thành công');
                }
                else {
                    Toastr::success('Thêm sản phẩm biến thể thành công');
                }
                return redirect()->route('admin.products.index');

        } catch (Exception $exception){
            dd($exception);
            Toastr::error('Lưu thất bại',$exception);
            return back();
        }
    }
    public function destroy($id) {
        try {
            $product = chitietsanpham::find($id);
            if($product) {
                $product->delete();
                Toastr::success('Xóa sản phẩm biến thể thành công');
            }
            else {
                Toastr::warning('Hiện không có sản phẩm biến thể này');
            }
        }
        catch(Exception $exception) {
            Toastr::error('Xóa sản phẩm biến thể thất bại');
        }
        return back();
    }
}

