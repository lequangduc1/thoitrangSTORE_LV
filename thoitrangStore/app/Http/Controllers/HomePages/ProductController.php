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

        $allProduct = $this->getALlMasterProduct();
        $params['allMasterProduct'] = $this->getAllMasterProductValid($allProduct);

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
        $params['productDetail'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.idsanpham')
                                                ->where('chitietsanpham.trangthai', 1)
                                                ->where('chitietsanpham.id', $produceCode)
                                                ->first();

        $listDetailProduct = $params['productDetail']->sanphams->chitiet->where('trangthai', 1);
        $params['listProductDetail']  = $this->validateProduct($listDetailProduct);
        $params['size_id'] = $params['productDetail']->idsize;
        $params['color_id'] = $params['productDetail']->idmau;
        $params['categoryId'] = $params['productDetail']->idloaisanpham;
        $params['productRelated'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.idsanpham')
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

    private function getALlMasterProduct()
    {
        return sanpham::where('trangthai', 1)->limit(12)->get();
    }

    private function getAllMasterProductValid($listMasterProduct)
    {
        $resArr = [];
        $count0 = 0;
        foreach ($listMasterProduct as $masterProduct) {
            if ($masterProduct->loaisanpham->trangthai == 1) {

                $count1 = 0;
                $checkLate = false;
                $listDetailProduct = $masterProduct->chitiet->where('trangthai', 1);
                if (count($listDetailProduct) > 0) {
                    foreach ($listDetailProduct as $product) {
                            $resArr[$count0][$count1] = $product;
                            $count1++;
                            $checkLate = true;
                    }
                    if ($checkLate) {
                        $count0++;
                    }
                }
            }
        }
        return $resArr;
    }
    private function validateProduct($listDetailProduct) {
        $resArr = [];
        foreach($listDetailProduct as $product) {
            $resArr[] = $product;
        }
        return $resArr;
    }
}
