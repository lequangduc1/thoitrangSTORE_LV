<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\sanpham;
use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index(){
        try {
            $params['products'] = sanpham::orderBy('id','desc')->get();
            $params['productType'] = loaisanpham::all();
            return view('adminPages.productmaster.index',$params);
        } catch (Exception $e) {
            $params['products'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.productmaster.index',$params);
        }
    }

    public function create(){
        $params['productType'] = loaisanpham::all();
        return view('adminPages.productmaster.create',$params);
    }

    public function update($id){
        try {
            $params['productType'] = loaisanpham::all();
            $params['products'] = sanpham::where('id',$id)->first();
            return view('adminPages.productmaster.update',$params);
        } catch (Exception $e) {

        }
    }

    public function store(Request $request){
        try{
            $data = $request->validate([
                "id" => 'nullable',
                "macodesanpham" => 'required|unique:sanpham',
                "ten_sp" => 'required|min:3',
                "idloaisanpham" => 'required',
                "mota" => "required|min:10",
                "trangthai" => 'required'
                ]);
            $date = date(today());
            if(isset($data['id'])){
                $masterProduct = sanpham::find($data['id']);
                // $data['updated_at'] = $date;
            }else{
                $masterProduct = New sanpham();
                // $data['created_at'] = $date;
            }

            if(isset($data['macodesanpham'])) {
                $masterProduct->macodesanpham = $data['macodesanpham'];
            }
            if(isset($data['ten_sp'])) {
                $masterProduct->ten_sp = $data['ten_sp'];
            }
            if(isset($data['trangthai'])) {
                $masterProduct->trangthai = $data['trangthai'];
            }
            if(isset($data['idloaisanpham'])) {
                $masterProduct->idloaisanpham = $data['idloaisanpham'];
            }
            if(isset($data['mota'])) {
                $masterProduct->mota = $data['mota'];
            }

            $masterProduct->save();

            if(isset($data['id'])) {
                Toastr::success('Cập nhật sản phẩm chủ thể thành công');
            }
            else {
                Toastr::success('Thêm sản phẩm chủ thể thành công');
            }
            return redirect()->route('admin.product_master.index');

        }catch (Exception $exception){
            Toastr::error('Lưu thất bại',$exception);
            return back();
        }
    }

	public function destroy($id) {
        try {
            $product = sanpham::find($id);
            if($product) {
                $timChiTietSanPham = chitietsanpham::where('idsanpham',$product->id)->get();
                if(count($timChiTietSanPham) > 0) {
                    Toastr::warning('Cần xóa các sản phẩm biến thể trước khi xóa sản phẩm');
                }
                else {
                    $product->delete();
                    Toastr::success('Xóa sản phẩm chủ thể thành công');
                }
            }
            else {
                Toastr::error('Xóa sản phẩm chủ thể thất bại');
            }
        }
        catch(Exception $exception) {
            Toastr::error('Xóa sản phẩm chủ thể thất bại');
        }
        return back();
    }
}
