<div class="header">
    <div class="container">
        <a class="site-logo" href="{{url('/')}}">
            <img style="height: 40px" src="{{getInformation('logo')}}" alt="{{getInformation('ten_shop')}}">
        </a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <div class="top-cart-info">
                <a href="javascript:void(0);" class="top-cart-info-count">{{getCart()['count']}} Sản Phẩm</a>
                <a href="javascript:void(0);" class="top-cart-info-value">{{number_format(getCart()['total'])}} VNĐ</a>
            </div>
            <i class="fa fa-shopping-cart"></i>
            <div class="top-cart-content-wrapper">
                <div class="top-cart-content">
                    <ul class="scroller" style="height: 250px;">
                        @foreach(getCart()['allProductInCart'] as $product)
                        <li>
                            <a href="shop-item.html">
                                <img src="{{asset('system/homePages/assets/pages/img/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34">
                            </a>
                            <span class="cart-content-count">x {{$product['quality']}}</span>
                            <strong><a href="shop-item.html">{{$product['name']}}</a></strong>
                            <em>{{number_format($product['price'])}} VNĐ</em>
                            <a
                                href="{{route('home.cart.remove-cart', $product['id'])}}"
                                class="del-goods">&nbsp;
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-right">
                        <a
                            href="{{route('home.cart.index')}}"
                            class="btn btn-default"
                        >Giỏ hàng</a>
                        <a href="{{route('home.order.index')}}" class="btn btn-primary">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                <li class="dropdown">
                    <a class="dropdown-toggle"  href="{{ route('home.product.list') }}">
                        sản phẩm
                    </a>
                </li>
                <li class="dropdown dropdown-megamenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Man

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                    <div class="col-md-4 header-navigation-col">
                                        <h4>Footwear</h4>
                                        <ul>
                                            <li><a href="shop-product-list.html">Astro Trainers</a></li>
                                            <li><a href="shop-product-list.html">Basketball Shoes</a></li>
                                            <li><a href="shop-product-list.html">Boots</a></li>
                                            <li><a href="shop-product-list.html">Canvas Shoes</a></li>
                                            <li><a href="shop-product-list.html">Football Boots</a></li>
                                            <li><a href="shop-product-list.html">Golf Shoes</a></li>
                                            <li><a href="shop-product-list.html">Hi Tops</a></li>
                                            <li><a href="shop-product-list.html">Indoor and Court Trainers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 header-navigation-col">
                                        <h4>Clothing</h4>
                                        <ul>
                                            <li><a href="shop-product-list.html">Base Layer</a></li>
                                            <li><a href="shop-product-list.html">Character</a></li>
                                            <li><a href="shop-product-list.html">Chinos</a></li>
                                            <li><a href="shop-product-list.html">Combats</a></li>
                                            <li><a href="shop-product-list.html">Cricket Clothing</a></li>
                                            <li><a href="shop-product-list.html">Fleeces</a></li>
                                            <li><a href="shop-product-list.html">Gilets</a></li>
                                            <li><a href="shop-product-list.html">Golf Tops</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 header-navigation-col">
                                        <h4>Accessories</h4>
                                        <ul>
                                            <li><a href="shop-product-list.html">Belts</a></li>
                                            <li><a href="shop-product-list.html">Caps</a></li>
                                            <li><a href="shop-product-list.html">Gloves, Hats and Scarves</a></li>
                                        </ul>

                                        <h4>Clearance</h4>
                                        <ul>
                                            <li><a href="shop-product-list.html">Jackets</a></li>
                                            <li><a href="shop-product-list.html">Bottoms</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 nav-brands">
                                        <ul>
                                            <li><a href="shop-product-list.html"><img title="esprit" alt="esprit" src="assets/pages/img/brands/esprit.jpg"></a></li>
                                            <li><a href="shop-product-list.html"><img title="gap" alt="gap" src="assets/pages/img/brands/gap.jpg"></a></li>
                                            <li><a href="shop-product-list.html"><img title="next" alt="next" src="assets/pages/img/brands/next.jpg"></a></li>
                                            <li><a href="shop-product-list.html"><img title="puma" alt="puma" src="assets/pages/img/brands/puma.jpg"></a></li>
                                            <li><a href="shop-product-list.html"><img title="zara" alt="zara" src="assets/pages/img/brands/zara.jpg"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="shop-item.html">Kids</a></li>
                <li class="dropdown dropdown100 nav-catalogue">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        New

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="assets/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="assets/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Pages

                    </a>

                    <ul class="dropdown-menu">
                        <li class="active"><a href="shop-index.html">Home Default</a></li>
                        <li><a href="shop-index-header-fix.html">Home Header Fixed</a></li>
                        <li><a href="shop-index-light-footer.html">Home Light Footer</a></li>
                        <li><a href="shop-product-list.html">Product List</a></li>
                        <li><a href="shop-search-result.html">Search Result</a></li>
                        <li><a href="shop-item.html">Product Page</a></li>
                        <li><a href="shop-shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                        <li><a href="shop-shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="shop-checkout.html">Checkout</a></li>
                        <li><a href="shop-about.html">About</a></li>
                        <li><a href="shop-contacts.html">Contacts</a></li>
                        <li><a href="shop-account.html">My account</a></li>
                        <li><a href="shop-wishlist.html">My Wish List</a></li>
                        <li><a href="shop-goods-compare.html">Product Comparison</a></li>
                        <li><a href="shop-standart-forms.html">Standart Forms</a></li>
                        <li><a href="shop-faq.html">FAQ</a></li>
                        <li><a href="shop-privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="shop-terms-conditions-page.html">Terms &amp; Conditions</a></li>
                    </ul>
                </li>


                <li><a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes&amp;utm_source=download&amp;utm_medium=banner&amp;utm_campaign=metronic_frontend_freebie" target="_blank">Admin theme</a></li>

                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
