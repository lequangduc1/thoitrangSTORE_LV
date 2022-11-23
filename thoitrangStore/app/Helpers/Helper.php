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

function getCartImport() : array{
    $cartInformation = \Illuminate\Support\Facades\Session::get('cartImport') ?? [];
    $total = 0;
    foreach ($cartInformation as $product) {
        $total += $product['gianhp'] * $product['soluongnhap'];
    }
    return [
        'count'=>count($cartInformation),
        'total'=>$total,
        'allProductInCartImport'=>$cartInformation
    ];
}

