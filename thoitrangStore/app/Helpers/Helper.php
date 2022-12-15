<?php

function getInformation($information_name)
{
    $information  = \App\Models\Information::all()->first();
    return $information[$information_name] ?? null;
}


function getCart() : array{
    $cartInformation = \Illuminate\Support\Facades\Session::get('cart') ?? [];
    $total = 0;
    foreach ($cartInformation as $product) {
        $total += $product['price'] * $product['quality'];
    }
    return [
        'count'=>count($cartInformation),
        'total'=>$total,
        'allProductInCart'=>$cartInformation
    ];
}


if(! function_exists('getNameProductTypeByID')) {
    function getNameProductTypeByID($list, $id) {
        $res = '';
        foreach($list as $item) {
            if($item->id == $id) {
                $res = $item->tenloai;
                break;
            }
        }
        return $res;
    }
}

function getCartImport() : array{
    $cartInformation = \Illuminate\Support\Facades\Session::get('cartImport') ?? [];
    $total = 0;
    foreach ($cartInformation as $product) {
        $total +=(int)$product['gianhp'] * (int)$product['soluongnhap'];
    }
    return [
        'count'=>count($cartInformation),
        'total'=>$total,
        'allProductInCartImport'=>$cartInformation
    ];
}

if(function_exists("checkShowProduct")) {
    function checkShowProduct($listProductDetail) {
        if(count($listProductDetail->where('trangthai','1')) > 0) {
            $sizeStatus = false;
            foreach($listProductDetail as $product) {
                if($product->sizes->trangthai == 1 && $product->maus->trangthai == 1) {
                    $sizeStatus = true;
                }
            }
            if($sizeStatus == true) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
