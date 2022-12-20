<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\loaisanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $params['allProduct'] = sanpham::where('trangthai', 1)->get();
        $params['newProduct'] = chitietsanpham::join('sanpham', 'chitietsanpham.id', '=', 'sanpham.id')
            ->orderby('chitietsanpham.created_at', 'DESC')
            ->where('sanpham.trangthai', 1)
            ->get();


        $params['allCategory'] = loaisanpham::where('trangthai', 1)->get();
        return view('homePages.home.index', $params);

    }
}
