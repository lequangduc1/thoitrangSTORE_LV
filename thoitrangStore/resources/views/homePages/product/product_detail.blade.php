@extends('homePages.index')
@section('title','Chi tiết sản phẩm')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li class="active">Chi tiết sản phẩm</li>
        </ul>
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-4">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    @foreach($allCategory as $category)
                        <li class="list-group-item clearfix {{isset($categoryId) && $categoryId == $category->id  ? 'active' : ''}}">
                            <a href="shop-product-list.html">
                                <i class="fa fa-angle-right"></i> {{$category->tenloai}}
                            </a>
                        </li>
                        @endforeach
                        </li>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="product-page">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="product-main-image">
                                <img src="{{asset($productDetail->anhsanpham)}}"
                                     alt="{{$productDetail->ten_sp}}"
                                     class="img-responsive"
                                     id="product_detail_img"
                                     data-BigImgsrc="{{asset($productDetail->anhsanpham)}}">
                            </div>
{{--                            <div class="product-other-images">--}}
{{--                                <a href="assets/pages/img/products/model3.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{{asset('system/homePages/assets/pages/img/products/model3.jpg')}}"></a>--}}
{{--                                <a href="assets/pages/img/products/model4.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{{asset('system/homePages/assets/pages/img/products/model4.jpg')}}"></a>--}}
{{--                                <a href="assets/pages/img/products/model5.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{{asset('system/homePages/assets/pages/img/products/model5.jpg')}}"></a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1>{{$productDetail->ten_sp}}</h1>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    <strong id="product_detail_price">{{number_format($productDetail->giasanpham)}} VNĐ</strong>
{{--                                    <em>$<span>62.00</span></em>--}}
                                </div>
                                <div class="availability">
                                    Size: <strong>{{$productDetail->sizes->tensize}}</strong><br>
                                    Color: <strong>In Stock</strong>
                                </div>
                            </div>
                            <div class="description">
                                <p>
                                    {{$productDetail->mota}}
                                </p>
                            </div>
                            <div class="product-page-options">
                                <div class="pull-left">
                                    <label class="control-label">Size:</label>
                                    <select
                                        class="form-control input-sm"
                                        onchange="hanleChangeOptionProductDetail()"
                                        data-productid="{{$productDetail->sanphams->id}}"
                                        id="product_detail_size">
                                        @foreach($sizes as $size)
                                            <option
                                                {{$size->id == $size_id ? 'selected' : ''}}
                                                value="{{$size->id}}"
                                            >{{$size->tensize}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pull-left">
                                    <label class="control-label">Color:</label>
                                    <select
                                        class="form-control input-sm"
                                        onchange="hanleChangeOptionProductDetail()"
                                        id="product_detail_color">
                                        @foreach($colors as $color)
                                            <option {{$color->id == $color_id ? 'selected' : ''}} value="{{$color->id}}">
                                                {{$color->tenmau}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="margin: 10px 0px">
                                @if($errors->any())
                                    <span class="msg__error__cart">{{$errors->first()}}</span>
                                @endif
                            </div>
                            <div class="product-page-cart">
                                <form method="GET" action="{{route('home.cart.add-to-cart', $productDetail->id)}}">
                                    <div class="product-quantity">
                                        <input id="product-quantity"
                                               type="number"
                                               style="-moz-appearance: textfield;"
                                               value="1"
                                               name="quality"
                                               class="form-control input-sm">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Thêm vào giỏ</button>
                                </form>
                                <span>Còn lại ({{$productDetail->soluong}})</span>
                            </div>
                        </div>
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li><a href="#Description" data-toggle="tab">Mô tả</a></li>
                                <li class="active">
                                    <a href="#Reviews" data-toggle="tab">Đánh giá ({{count($comments)}})</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade" id="Description">
                                    <p>
                                        {{$productDetail->mota}}
                                    </p>
                                </div>
                                <div class="tab-pane fade in active" id="Reviews">
                                    <!--<p>There are no reviews for this product.</p>-->
                                    @foreach($comments as $comment)
                                    <div class="review-item clearfix">
                                        <div class="review-item-submitted">
                                            <strong>{{$comment->khachhang[0]->hovaten}}</strong>
                                            <em>{{$comment->created_at}}</em>
                                            <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="review-item-content">
                                            <p>{{$comment->noidung}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- BEGIN FORM-->
                                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                                    <form method="POST" action="{{route('home.product.add_comment')}}" class="reviews-form" role="form">
                                        @php
                                            $name = \Illuminate\Support\Facades\Auth::guard('customer')->user()->hovaten;
                                            $email = \Illuminate\Support\Facades\Auth::guard('customer')->user()->email;
                                            $id_user = \Illuminate\Support\Facades\Auth::guard('customer')->user()->id;
                                            $id_product = $productDetail->id;
                                        @endphp
                                        @csrf
                                        <input value="{{$id_user}}" type="hidden" name="id_user"/>
                                        <input value="{{$id_product}}" type="hidden" name="id_product" id="id_product"/>
                                        <h2>Đánh giá</h2>
                                        <div class="form-group">
                                            <label for="review">Nội dung <span class="require">*</span></label>
                                            <textarea name="content" class="form-control" rows="8" id="review"></textarea>
                                        </div>
                                        <div class="padding-top-20">
                                            <button type="submit" class="btn btn-primary">Gởi</button>
                                        </div>
                                    </form>
                                    @else
                                        <strong>Bạn cần <a href="{{route('home.auth.login_form')}}">login</a> để được bình luận!</strong>
                                    @endif
                                    <!-- END FORM-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        @if(count($productRelated) > 0)
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h2>Các sản phẩm liên quan</h2>
                <div class="owl-carousel owl-carousel4">
                    @foreach($productRelated as $product)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset('system/homePages/assets/pages/img/products/k1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">{{$product->ten_sp}}</a></h3>
                            <div class="pi-price">{{number_format($product->giasanpham)}} VNĐ</div>
                            <a href="{{route('home.cart.add-to-cart', $product->id)}}" class="btn btn-default add2cart">Thêm vào giỏ hàng</a>
                            <div class="sticker sticker-new"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
