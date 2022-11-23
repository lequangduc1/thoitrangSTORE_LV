@extends('homePages.index')
@section('title', 'Trang chủ')
@section('content')
    <div class="container">
    <!-- BEGIN SIDEBAR & CONTENT -->
    @if(count($allProductInCart) > 0)
    <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
            <h1>Giỏ hàng</h1>
            <div class="goods-page">
                <div class="goods-data clearfix">
                    <div class="table-wrapper-responsive">
                        <form action="{{route('home.cart.update-quality')}}" method="POST">
                            @csrf
                        <table summary="Shopping cart" >
                            <tr>
                                <th class="goods-page-image">Hình ảnh</th>
                                <th class="goods-page-description">Mô tả</th>
                                <th class="goods-page-quantity">Số lượng</th>
                                <th class="goods-page-price">Đơn giá</th>
                                <th class="goods-page-total" colspan="2">Thành tiền</th>
                            </tr>
                            @foreach($allProductInCart as $product)
                            <tr>
                                <td class="goods-page-image">
                                    <a href="javascript:;">
                                        <img src="{{asset('system/homePages/assets/pages/img/products/model3.jpg')}}"
                                             alt="Berry Lace Dress">
                                    </a>
                                </td>
                                <td class="goods-page-description">
                                    <h3><a href="javascript:;">{{$product['name']}}</a></h3>
                                    <p>
                                        <strong>Thông tin: </strong>
{{--                                        Color: <span class="filter__color" style="background-color: {{$product['color']}}"></span>;--}}
                                        Size: {{$product['size']}}
                                    </p>
                                </td>
                                <td class="goods-page-quantity">
                                    <div class="product-quantity">
                                        <input id="product-quantity"
                                               type="number"
                                               name="product_{{$product['id']}}"
                                               value="{{$product['quality']}}"
                                               data-product="{{$product['id']}}"
                                               class="form-control input-sm input__quality">
                                        <span class="quality__max">
                                            (Còn lại: {{$product['quality_max']}})
                                        </span>
                                    </div>
                                </td>
                                <td class="goods-page-price">
                                    <strong>
                                        {{number_format($product['price'])}}
                                        VNĐ
                                    </strong>
                                </td>
                                <td class="goods-page-total">
                                    <strong>
                                        {{number_format($product['price'] * $product['quality'])}}
                                        VNĐ
                                    </strong>
                                </td>
                                <td class="del-goods-col">
                                    <a
                                        class="del-goods"
                                        href="{{route('home.cart.remove-all-cart', $product['id'])}}"
                                    >&nbsp;
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @if($errors->any())
                            <span class="msg__error__cart">{{$errors->first()}}</span>
                        @endif
                        <button
                            type="submit"
                            class="btn__save__quality"
                        >
                            Lưu Thay Đổi
                        </button>
                        </form>
                    </div>

                    <div class="shopping-total">
                        <ul>
                            <li>
                                <em>Tổng tiền</em>
                                <strong class="price">
                                    {{ number_format($total) }}
                                    VNĐ
                                </strong>
                            </li>
                            <li>
                                <em>Tiền ship</em>
                                <strong class="price">
                                    0 VNĐ
                                </strong>
                            </li>
                            <li class="shopping-total-price">
                                <em>Phải trả</em>
                                <strong class="price">
                                    {{number_format($total)}}
                                    VNĐ
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-default"
                        onclick="window.location.href='/'"
                        type="submit">
                    Mua thêm
                    <i class="fa fa-shopping-cart"></i>
                </button>
                <button class="btn btn-primary"
                        onclick="window.location.href='/order'"
                        type="submit">
                    Thanh toán<i class="fa fa-check"></i>
                </button>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
    @else
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h1>Giỏ hàng</h1>
                <div class="shopping-cart-page">
                    <div class="shopping-cart-data clearfix">
                        <p>Không có sản phẩm nào trong giỏ hàng!</p>
                    </div>
                </div>
                <button
                    type="submit"
                    onclick="window.location.href='/'"
                    class="btn__save__quality"
                >
                    Mua sản phẩm
                </button>
            </div>
        </div>
    @endif
@endsection
