<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\kickthuocsanpham;
use App\Models\loaisanpham;
use App\Models\mausanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request){
        $query = $request->query('category');
        if($query){
            $params['allProduct'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                ->where('trangthai', 1)
                ->where('idloaisanpham', $query)
                ->get();
            $params['categoryId'] = $query;
        }else{
            $params['allProduct'] = chitietsanpham::join('sanpham', 'sanpham.id', '=', 'chitietsanpham.id')
                ->where('trangthai', 1)
                ->get();
        }
        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        $params['allColor'] = mausanpham::where('trangthai', 1)->get();
        $params['allSize'] = kickthuocsanpham::where('trangthai', 1)->get();

        return view('homePages.product.product_list', $params);
    }

}
