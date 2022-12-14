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
        $params['allMasterProduct'] = sanpham::where('trangthai', 1)->orderby('created_at', 'desc')->limit(12)->get();
        $params['newProduct'] = chitietsanpham::join('sanpham', 'chitietsanpham.idsanpham', '=', 'sanpham.id')
                                                    ->orderby('chitietsanpham.created_at', 'DESC')
                                                ->where('sanpham.trangthai', 1)
                                                ->get();

        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        $params['sizeProduct'] = kickthuocsanpham::all();
        $params['colorProduct'] = mausanpham::all();
        return view('homePages.home.index', $params);
    }

    public function getProductById($id) {
        $params['product'] = chitietsanpham::find($id);
        $params['listDetailProduct'] = sanpham::find($params['product']->idsanpham)->chitiet;
        foreach($params['listDetailProduct'] as $item) {
            $item['tensize'] = $item->sizes->tensize;
            $item['code'] = $item->maus->code;
        }
        return $params;
    }
}
