<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $params['total'] = getCart()['total'];
        $params['allProductInCart'] = getCart()['allProductInCart'];
        return view('homePages.cart.index', $params);
    }


    public function addToCart($productId, Request $request)
    {
        try {
            $query = $request->query('quality');

            $productInformation = chitietsanpham::join('sanpham', 'chitietsanpham.id', '=', 'sanpham.id')
                ->where('sanpham.trangthai', 1)
                ->where('sanpham.id', $productId)
                ->first();

            $sessionCurrent = Session::get('cart') ?? array();
            if (array_key_exists('product_' . $productId, $sessionCurrent)) {
                if ($query && ($query + $sessionCurrent['product_' . $productId]['quality'] > $productInformation->soluong)) {
                    return redirect()->back()->withErrors(['msg' => 'Số lương không đủ !!']);
                }
                $sessionCurrent['product_' . $productId]['quality'] += $query ?? 1;
                Session::push('cart', $sessionCurrent);
            } else {
                $productNew = [
                    'id' => $productInformation->id,
                    'code' => $productInformation->macodesanpham,
                    'product_id' => $productInformation->idsanpham,
                    'img' => $productInformation->anhsanpham,
                    'quality' => $query ?? 1,
                    'quality_max' => $productInformation->soluong,
                    'name' => $productInformation->ten_sp,
                    'price' => $productInformation->giasanpham,
                    'color' => $productInformation->maus->tenmau,
                    'size' => $productInformation->sizes->tensize
                ];

                $sessionCurrent['product_' . $productId] = $productNew;
                Session::push('cart', $sessionCurrent);
            }
            Session::put('cart', $sessionCurrent);
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function removeCart($productId)
    {
        try {
            $sessionCurrent = Session::get('cart') ?? array();
            if (array_key_exists('product_' . $productId, $sessionCurrent)) {
                if ($sessionCurrent['product_' . $productId]['quality'] > 1) {
                    $sessionCurrent['product_' . $productId]['quality'] = $sessionCurrent['product_' . $productId]['quality'] - 1;
                } else {
                    unset($sessionCurrent['product_' . $productId]);
                }
                Session::put('cart', $sessionCurrent);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function updateQuality(Request $request)
    {
        try {
            $sessionCurrent = Session::get('cart') ?? array();
            $params = $request->input();
            unset($params['_token']);
            foreach ($params as $productId => $quality) {
                if ($quality < 1) {
                    return redirect()->back()->withErrors(['msg' => 'Số lượng sản phẩm không phù hợp!!']);
                }
                if ($quality > $sessionCurrent[$productId]['quality_max']) {
                    return redirect()->back()->withErrors(['msg' => 'Số lượng sản phẩm Không đủ!!']);
                }
                $sessionCurrent[$productId]['quality'] = $quality;

            }
            Session::put('cart', $sessionCurrent);
            return redirect()->back();
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function removeAllCart($productId)
    {
        try {
            $sessionCurrent = Session::get('cart') ?? array();
            unset($sessionCurrent['product_' . $productId]);
            Session::put('cart', $sessionCurrent);
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
