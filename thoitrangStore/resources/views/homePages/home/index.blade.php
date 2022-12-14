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
                        @php
                            $img_url = $product->anhsanpham;
                        @endphp
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img
                                        src="{{asset($img_url)}}"
                                        class="img-responsive"
                                        style="max-height: 190px;"
                                        alt="{{$product->sanphams->ten_sp}}">
                                    <div>
                                        <a href="{{asset($img_url)}}" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="{{route('home.product.detail', $product->id)}}"
                                           class="btn btn-default fancybox-fast-view">
                                            View
                                        </a>
                                    </div>
                                </div>
                                <h3>
                                    <a href="{{route('home.product.detail', $product->id)}}">
                                    {{$product->ten_sp.' '.$product->sizes->tensize.' '.$product->maus->tenmau}}
                                    </a>
                                </h3>
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
                        <li class="list-group-item clearfix">
                            <a href="{{url('/product?category='.$category->id)}}">
                                <i class="fa fa-angle-right"></i> {{$category->tenloai}}
                            </a>
                        </li>
                        @endforeach
                    </li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-8">
                <h2>Tất cả sản phẩm</h2>
                <div class="owl-carousel owl-carousel3">
                @foreach($allMasterProduct as $keyProduct => $products)
                    @if(count($products->chitiet->where('trangthai', 1)) >0)
                        @php
                            $listProductDetail = $products->chitiet->where('trangthai', 1);
                            $img_url = $listProductDetail[0]->anhsanpham;
                            $price = $listProductDetail[0]->giasanpham;
                            $listSize = [];
                        @endphp
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset($img_url)}}"
                                     class="img-responsive"
                                     style="max-height: 250px;"
                                     alt="{{$products->ten_sp}}"
                                     id="img_{{$keyProduct}}">
                                <div>
                                    <a href="{{asset($img_url)}}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a
                                        href="{{route('home.product.detail', $products->id)}}"
                                        class="btn btn-default fancybox-fast-view">
                                            View
                                    </a>
                                </div>
                            </div>
                            <h3><a href="{{route('home.product.detail', $products->id)}}">{{$products->ten_sp}}</a></h3>
                            <div>
                                <h6 id="size_{{$keyProduct}}">Size:
                                    @foreach($listProductDetail as $key => $product)
                                        @php
                                            $tensize = $sizeProduct->where('id',$product->idsize)->first()->tensize;
                                        @endphp
                                        @if(!in_array($product->idsize, $listSize))
                                            @php
                                                $listSize[] = $product->idsize;
                                            @endphp
                                            <button
                                            class="btn btn-secondary"
                                            {{ ($key == 0) ? 'disabled' : '' }} onclick="getProductInformation({{$product->id}}, 'size', {{$keyProduct}})">
                                                {{  $tensize  }}
                                            </button>
                                        @endif
                                    @endforeach
                                </h6>
                                <h6 id="color_{{$keyProduct}}">Màu:
                                    @foreach($listProductDetail as $key => $product)
                                        @php
                                            $codeColor = $colorProduct->where('id',$product->idmau)->first()->code;
                                        @endphp
                                        @if($product->idsize == $listProductDetail[0]->idsize)
                                            <button {{ $key == 0 ? 'disabled' : '' }}
                                            onclick="getProductInformation({{$product->id}}, 'color', {{$keyProduct}})"
                                            style="background-color: {{$codeColor}}"
                                            class="color__button"> </button>
                                        @endif
                                    @endforeach
                                </h6>
                            </div>

                            <div class="pi-price" id="price_{{$keyProduct}}">{{number_format($price,0,',','.').' VNĐ' }}</div>
                            <a href="{{route('home.cart.add-to-cart', $products->id)}}"
                               class="btn btn-default add2cart"
                               id="link_{{$keyProduct}}"
                            >Thêm vào giỏ</a>e
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
{{--        <div class="row margin-bottom-35 ">--}}
{{--            <!-- BEGIN TWO PRODUCTS -->--}}
{{--            <div class="col-md-6 two-items-bottom-items">--}}
{{--                <h2>Sales</h2>--}}
{{--                <div class="owl-carousel owl-carousel2">--}}
{{--                    <div>--}}
{{--                        <div class="product-item">--}}
{{--                            <div class="pi-img-wrapper">--}}
{{--                                <img src="{{asset('system/homePages/assets/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                <div>--}}
{{--                                    <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                            <div class="pi-price">$29.00</div>--}}
{{--                            <a href="javascript:;" class="btn btn-default add2cart">Thêm vào giỏ</a>--}}
{{--                            <div class="sticker sticker-sale"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="product-item">--}}
{{--                            <div class="pi-img-wrapper">--}}
{{--                                <img src="{{asset('system/homePages/assets/pages/img/products/k4.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                                <div>--}}
{{--                                    <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>--}}
{{--                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>--}}
{{--                            <div class="pi-price">$29.00</div>--}}
{{--                            <a--}}
{{--                                href="javascript:;"--}}
{{--                                class="btn btn-default add2cart"--}}
{{--                            >Thêm vào giỏ</a>--}}
{{--                            <div class="sticker sticker-sale"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END TWO PRODUCTS -->--}}
{{--            <!-- BEGIN PROMO -->--}}
{{--            <div class="col-md-6 shop-index-carousel">--}}
{{--                <div class="content-slider">--}}
{{--                    <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--                        <!-- Indicators -->--}}
{{--                        <ol class="carousel-indicators">--}}
{{--                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--                            <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--                            <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--                        </ol>--}}
{{--                        <div class="carousel-inner">--}}
{{--                            <div class="item active">--}}
{{--                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide2.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <img src="{{asset('system/homePages/assets/pages/img/index-sliders/slide3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END PROMO -->--}}
{{--        </div>--}}
        <!-- END TWO PRODUCTS & PROMO -->
    </div>

    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endsection
