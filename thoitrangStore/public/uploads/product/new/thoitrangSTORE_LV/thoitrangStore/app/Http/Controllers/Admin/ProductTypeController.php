<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductTypeController extends Controller
{
    public function index()
    {
        try {
            $params['productTypes'] = loaisanpham::orderBy('id', 'desc')->get();
            return view('adminPages.producttype.index', $params);
        } catch (Exception $e) {
            $params['productTypes'] = null;
            Toastr::error('Lỗi Lấy dữ liệu');
            return view('adminPages.producttype.index', $params);
        }

    }

    public function create()
    {
        return view('adminPages.producttype.create');
    }

    public function update($id)
    {
        try {
            $params['productType'] = loaisanpham::where('id', $id)->first();
            if (isset($params['productType'])) {
                return view('adminPages.producttype.update', $params);
            } else {
                Toastr::error(`Không tìm thấy Loại Sản phẩm có id = $id`);
                return redirect()->route('admin.producttype.index');
            }
        } catch (Exception $e) {
            Toastr::error('lỗi khi tải trang khách hàng');
            return redirect()->route('admin.producttype.index');
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->input();
            $checkName = loaisanpham::where('tenloai', $data['tenloai'])->first();
            if (isset($checkName)) {
                Toastr::error('Lưu thất bại: tên loại đã tồn tại !!!');
                return back();
            }
            $date = date(today());
            if (isset($data['id'])) {
                $newProductType = loaisanpham::find($data['id']);
                $data['updated_at'] = $date;
            } else {
                $newProductType = new loaisanpham();
                $data['created_at'] = $date;
            }
            $newProductType->fill($data);
            $newProductType->save();
            Toastr::success('Lưu thành công');
            return redirect()->route('admin.producttype.index');

        } catch (\Exception $exception) {
            Toastr::error('Lưu thất bại');
            return back();
        }
    }
}
