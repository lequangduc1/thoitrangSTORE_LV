@extends('homePages.index')
@section('title','Tất cả sản phẩm')
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html">Trang chủ</a></li>
        <li class="active">Loại sản phẩm</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-5 active">
            <ul class="list-group margin-bottom-25 sidebar-menu">
                @foreach($allCategory as $category)
                <li class="list-group-item clearfix {{isset($categoryId) && $categoryId == $category->id  ? 'active' : ''}}">
                    <a href="{{url('/product?category='.$category->id)}}">
                        <i class="fa fa-angle-right"></i> {{$category->tenloai}}
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="sidebar-filter margin-bottom-25">
                <h2>Lọc</h2>
                <h3>Màu</h3>
                <div class="checkbox-list">
                    @foreach($allColor as $color)
                    <a href="javascript:void(0)" class="filter">
                        <span class="filter__color filter__option" data-color="color_{{$color->id}}" style="background-color: {{$color->tenmau}};"></span>
                    </a>
                    @endforeach
                </div>
                <h3>Size</h3>
                <div class="checkbox-list">
                    @foreach($allSize as $size)
                    <a href="javascript:void(0)" class="filter">
                        <span class="filter__size filter__option" data-size="size_{{$size->id}}">
                            {{$size->tensize}}
                        </span>
                    </a>
                    @endforeach
                </div>
                {{-- <h3>Price</h3>--}}
                {{-- <p>--}}
                {{-- <label for="amount">Range:</label>--}}
                {{-- <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">--}}
                {{-- </p>--}}
                {{-- <div id="slider-range"></div>--}}
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
            {{-- <div class="row list-view-sorting clearfix">--}}
            {{-- <div class="col-md-2 col-sm-2 list-view">--}}
            {{-- <a href="javascript:;"><i class="fa fa-th-large"></i></a>--}}
            {{-- <a href="javascript:;"><i class="fa fa-th-list"></i></a>--}}
            {{-- </div>--}}
            {{-- <div class="col-md-10 col-sm-10">--}}
            {{-- <div class="pull-right">--}}
            {{-- <label class="control-label">Show:</label>--}}
            {{-- <select class="form-control input-sm">--}}
            {{-- <option value="#?limit=24" selected="selected">24</option>--}}
            {{-- <option value="#?limit=25">25</option>--}}
            {{-- <option value="#?limit=50">50</option>--}}
            {{-- <option value="#?limit=75">75</option>--}}
            {{-- <option value="#?limit=100">100</option>--}}
            {{-- </select>--}}
            {{-- </div>--}}
            {{-- <div class="pull-right">--}}
            {{-- <label class="control-label">Sort&nbsp;By:</label>--}}
            {{-- <select class="form-control input-sm">--}}
            {{-- <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>--}}
            {{-- <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>--}}
            {{-- <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>--}}
            {{-- <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>--}}
            {{-- <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>--}}
            {{-- <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>--}}
            {{-- <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>--}}
            {{-- <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>--}}
            {{-- <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>--}}
            {{-- </select>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list" style="min-height: 500px">
                <!-- PRODUCT ITEM START -->
                <!-- @foreach($allProduct as $product)
                        @php
                            $img_url = $product->anhsanpham;
                        @endphp
                    <div class="col-md-4 col-sm-6 col-xs-12 product-wrapper">
                        <div class="product-item" data-size="size_{{$product->idsize}}" data-color="color_{{$product->idmau}}">
                            <div class="pi-img-wrapper">
                                <img
                                    src="{{asset($img_url)}}"
                                    class="img-responsive"
                                    alt="{{$product->sanphams->ten_sp}}">
                                <div>
                                    <a href="{{asset($img_url)}}"
                                       class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{{route('home.product.detail', $product->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">{{$product->ten_sp}}</a></h3>
                            <div class="pi-price">{{number_format($product->giasanpham) .' VND'}}</div>
                            <a
                                href="{{route('home.cart.add-to-cart', $product->id)}}"
                                class="btn btn-default add2cart"
                            >Thêm vào giỏ</a>
                        </div>
                    </div>
                    @endforeach -->

                @foreach($allMasterProduct as $keyProduct => $products)
                @php
                $firstProduct = $products[0];
                $img_url = $firstProduct->anhsanpham;
                $price = $firstProduct->giasanpham;
                $productName = $firstProduct->sanphams->ten_sp;
                $listSize = [];
                @endphp
                <div class="col-md-4 col-sm-6 col-xs-12 product-wrapper">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img src="{{asset($img_url)}}" class="img-responsive" style="max-height: 240px;" alt="{{$productName}}" id="img_{{$keyProduct}}">
                            <div>
                                <a href="{{asset($img_url)}}" class="btn btn-default fancybox-button">Zoom</a>
                                <a href="{{route('home.product.detail', $firstProduct->id)}}" class="btn btn-default fancybox-fast-view">
                                    View
                                </a>
                            </div>
                        </div>
                        <h3><a href="{{route('home.product.detail', $firstProduct->id)}}">{{$productName}}</a></h3>
                        <div>
                            <h6 id="size_{{$keyProduct}}">Size:
                                @foreach($products as $key => $product)
                                @if(!in_array($product->idsize, $listSize))
                                @php
                                $listSize[] = $product->idsize;
                                @endphp
                                <button class="btn btn-secondary" {{ ($key == 0) ? 'disabled' : '' }} onclick="getProductInformation({{$product->id}}, 'size', {{$keyProduct}})">
                                    {{ $product->sizes->tensize  }}
                                </button>
                                @endif
                                @endforeach
                            </h6>
                            <h6 id="color_{{$keyProduct}}">Màu:
                                @foreach($products as $key => $product)
                                @if($product->idsize == $firstProduct->idsize)
                                <button {{ $key == 0 ? 'disabled' : '' }} onclick="getProductInformation({{$product->id}}, 'color', {{$keyProduct}})" style="background-color: {{$product->maus->code }};" class="color__button"> </button>
                                @endif
                                @endforeach
                            </h6>
                        </div>

                        <div class="pi-price" id="price_{{$keyProduct}}">{{number_format($price,0,',','.').' VND' }}</div>
                        <a href="{{route('home.cart.add-to-cart', $firstProduct->id)}}" class="btn btn-default add2cart" id="link_{{$keyProduct}}">Thêm vào giỏ</a>
                    </div>
                </div>
                @endforeach

                <!-- PRODUCT ITEM END -->
            </div>

            <!-- BEGIN PAGINATOR -->
            {{-- <div class="row">--}}
            {{-- <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>--}}
            {{-- <div class="col-md-8 col-sm-8">--}}
            {{-- <ul class="pagination pull-right">--}}
            {{-- <li><a href="javascript:;">&laquo;</a></li>--}}
            {{-- <li><a href="javascript:;">1</a></li>--}}
            {{-- <li><span>2</span></li>--}}
            {{-- <li><a href="javascript:;">3</a></li>--}}
            {{-- <li><a href="javascript:;">4</a></li>--}}
            {{-- <li><a href="javascript:;">5</a></li>--}}
            {{-- <li><a href="javascript:;">&raquo;</a></li>--}}
            {{-- </ul>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            <!-- END PAGINATOR -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
</div>

@endsection
