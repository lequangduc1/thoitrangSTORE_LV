<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\DanhGia;
use App\Models\kickthuocsanpham;
use App\Models\loaisanpham;
use App\Models\mausanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request){
        $query = $request->query('category');
        
        $params['allMasterProduct'] = sanpham::where('trangthai', 1)->orderby('created_at', 'desc')->limit(12)->get();
        $params['sizeProduct'] = kickthuocsanpham::all();
        $params['colorProduct'] = mausanpham::all();
        if($query){
            $params['allProduct'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                ->where('chitietsanpham.trangthai', 1)
                ->where('idloaisanpham', $query)
                ->get();
            $params['categoryId'] = $query;
        }else{
            $params['allProduct'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                ->where('chitietsanpham.trangthai', 1)
                ->get();
        }
        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        $params['allColor'] = mausanpham::where('trangthai', 1)->get();
        $params['allSize'] = kickthuocsanpham::where('trangthai', 1)->get();

        return view('homePages.product.product_list', $params);
    }

    public function detail($produceCode){
        //get all category
        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        //get product information
        $params['productDetail'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                                                ->where('chitietsanpham.trangthai', 1)
                                                ->where('chitietsanpham.id', $produceCode)
                                                ->first();

        $params['listProductDetail']  = $params['productDetail']->sanphams->chitiet;
        $params['size_id'] = $params['productDetail']->idsize;
        $params['color_id'] = $params['productDetail']->idmau;
        $params['categoryId'] = $params['productDetail']->idloaisanpham;
        $params['productRelated'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                                                    ->where('chitietsanpham.trangthai', 1)
                                                    ->where('idloaisanpham', $params['productDetail']->idloaisanpham)
                                                    ->where('chitietsanpham.id', '<>', $produceCode)
                                                    ->get();
        $params['comments'] = DanhGia::where('trangthai', 1)
                                    ->where('masanpham', $params['productDetail']->id)
                                    ->get();

        return view('homePages.product.product_detail', $params);
    }

    public function addComment(Request $request) {
        try{
            $id_product = $request->id_product;
            $id_user = $request->id_user;
            $newComment = new DanhGia();
            $newComment->makhachhang = $id_user;
            $newComment->masanpham = $id_product;
            $newComment->noidung = $request->content;
            $newComment->save();

            return redirect()->back()->with(['success'=>'Thêm đánh giá thành công!!']);
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function filterOption(Request $request){

        try{
            $product_id = $request->product_id;

            $params['productDetail'] = chitietsanpham::find($product_id);
            $params['tensize'] = $params['productDetail']->sizes->tensize;
            $params['code'] = $params['productDetail']->maus->code;
            foreach($params['productDetail']->sanphams->chitiet as $item) {
                $item['tensize'] = $item->sizes->tensize;
                $item['code'] = $item->maus->code;
            }
            return $params;
        }catch(\Exception $e){
            dd($e);
        }
    }

}
