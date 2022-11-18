@extends('homePages.index')
@section('title', 'Trang chủ')
@section('content')
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Sản phẩm mới</h2>
                <div class="owl-carousel owl-carousel5">
                    @foreach($newProduct as $product)
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{asset('system/homePages/assets/pages/img/products/model1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">{{$product->ten_sp}}</a></h3>
                                <div class="pi-price">{{number_format($product->giasanpham). ' VNĐ'}}</div>
                                <a
                                    href="{{route('home.cart.add-to-cart', $product->id)}}"
                                    class="btn btn-default add2cart"
                                >Thêm vào giỏ</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-4">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    @foreach($allCategory as $category)
                        <li class="list-group-item clearfix"><a href="shop-product-list.html">
                                <i class="fa fa-angle-right"></i> {{$category->tenloai}}</a>
                        </li>
                        @endforeach

{{--                   <li class="list-group-item clearfix dropdown">--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li class="list-group-item dropdown clearfix">--}}
{{--                                <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Shoes </a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li class="list-group-item dropdown clearfix">--}}
{{--                                        <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic </a>--}}
{{--                                        <ul class="dropdown-menu">--}}
{{--                                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="list-group-item dropdown clearfix">--}}
{{--                                        <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport  </a>--}}
{{--                                        <ul class="dropdown-menu">--}}
{{--                                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>--}}
{{--                                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>--}}
{{--                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>--}}
{{--                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>--}}
{{--                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>--}}
{{--                        </ul>--}}
                    </li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-8">
                <h2>Tất cả sản phẩm</h2>
                <div class="owl-carousel owl-carousel3">
                    @foreach($allProduct as $product)
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
                            <div class="pi-price">{{number_format($product->giasanpham).' VNĐ' }}</div>
                            <a href="{{route('home.cart.add-to-cart', $product->id)}}"
                               class="btn btn-default add2cart"
                            >Thêm vào giỏ</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-6 two-items-bottom-items">
                <h2>Sales</h2>
                <div class="owl-carousel owl-carousel2">
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset('system/homePages/assets/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">$29.00</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Thêm vào giỏ</a>
                            <div class="sticker sticker-sale"></div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset('system/homePages/assets/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">$29.00</div>
                            <a
                                href="javascript:;"
                                class="btn btn-default add2cart"
                            >Thêm vào giỏ</a>
                            <div class="sticker sticker-sale"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            <div class="col-md-6 shop-index-carousel">
                <div class="content-slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide2.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->
    </div>
@endsection
