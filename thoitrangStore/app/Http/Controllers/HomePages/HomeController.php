<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\kickthuocsanpham;
use App\Models\loaisanpham;
use App\Models\mausanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $newProduct = $this->getNewMasterProduct();
        $allProduct = $this->getALlMasterProduct();

        $params['allMasterProduct'] = $this->getAllMasterProductValid($allProduct);
        $params['newMasterProduct'] = $this->getAllMasterProductValid($newProduct);

        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        $params['sizeProduct'] = kickthuocsanpham::all();
        $params['colorProduct'] = mausanpham::all();
        return view('homePages.home.index', $params);
    }

    public function getProductById($id) {
        $params['product'] = chitietsanpham::find($id);
        $params['listDetailProduct'] = $this->getProductDetailByIdMPValid($params['product']->idsanpham);
        return $params;
    }

    private function getNewMasterProduct() {
        return sanpham::where('trangthai', 1)->orderBy('created_at', "DESC")->limit(6)->get();
    }

    private function getALlMasterProduct() {
        return sanpham::where('trangthai', 1)->limit(12)->get();
    }

    private function getAllMasterProductValid($listMasterProduct) {
        $resArr = [];
        $count0 = 0;
        foreach($listMasterProduct as $masterProduct) {
            if($masterProduct->loaisanpham->trangthai == 1) {
                $count1 = 0;
                $checkLate = false;
                $listDetailProduct = $masterProduct->chitiet->where('trangthai', 1);
                if(count($listDetailProduct) > 0) {
                    foreach($listDetailProduct as $product) {
                        $resArr[$count0][$count1] = $product;
                        $count1++;
                        $checkLate = true;
                    }
                    if($checkLate) {
                        $count0++;
                    }
                }
            }
        }
        return $resArr;
    }

    public function getProductDetailByIdMPValid($id) {
        $resArr = [];
        $listProduct = chitietsanpham::where('trangthai',1)->where('idsanpham', $id)->get();
        foreach($listProduct as $product) {
            if($product->sizes->trangthai == 1 && $product->maus->trangthai == 1) {
                $resArr[] = $product;
            }
        }
        foreach($resArr as $item) {
            $item['tensize'] = $item->sizes->tensize;
            $item['code'] = $item->maus->code;
        }

        return $resArr;
    }
}
