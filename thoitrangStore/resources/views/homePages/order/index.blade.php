@extends('homePages.index')
@section('title', 'Trang chủ')
@section('content')
    <div class="container">
        <form action="{{route('home.order.checkout')}}" method="POST">
            @csrf
        <!-- BEGIN SIDEBAR & CONTENT -->
        <input type="hidden" value="" name="code_sale" id="order_code"/>
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Thanh Toán</h1>
                <!-- BEGIN CHECKOUT PAGE -->
{{--                <div class="panel-group checkout-page accordion scrollable" id="checkout-page">--}}

{{--                    <!-- BEGIN CHECKOUT -->--}}
{{--                    <div id="checkout" class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h2 class="panel-title">--}}
{{--                                <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">--}}
{{--                                    Step 1: Checkout Options--}}
{{--                                </a>--}}
{{--                            </h2>--}}
{{--                        </div>--}}
{{--                        <div id="checkout-content" class="panel-collapse collapse in">--}}
{{--                            <div class="panel-body row">--}}
{{--                                <div class="col-md-6 col-sm-6">--}}
{{--                                    <h3>New Customer</h3>--}}
{{--                                    <p>Checkout Options:</p>--}}
{{--                                    <div class="radio-list">--}}
{{--                                        <label>--}}
{{--                                            <input type="radio" name="account"  value="register"> Register Account--}}
{{--                                        </label>--}}
{{--                                        <label>--}}
{{--                                            <input type="radio" name="account"  value="guest"> Guest Checkout--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>--}}
{{--                                    <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-6">--}}
{{--                                    <h3>Returning Customer</h3>--}}
{{--                                    <p>I am a returning customer.</p>--}}
{{--                                    <form role="form" action="#">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="email-login">E-Mail</label>--}}
{{--                                            <input type="text" id="email-login" class="form-control">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="password-login">Password</label>--}}
{{--                                            <input type="password" id="password-login" class="form-control">--}}
{{--                                        </div>--}}
{{--                                        <a href="javascript:;">Forgotten Password?</a>--}}
{{--                                        <div class="padding-top-20">--}}
{{--                                            <button class="btn btn-primary" type="submit">Login</button>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="login-socio">--}}
{{--                                            <p class="text-muted">or login using:</p>--}}
{{--                                            <ul class="social-icons">--}}
{{--                                                <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>--}}
{{--                                                <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>--}}
{{--                                                <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>--}}
{{--                                                <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- END CHECKOUT -->

                    <!-- BEGIN PAYMENT ADDRESS -->
                    <div id="payment-address" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                                    Bước 1: Thông tin tài khoản và địa chỉ nhận hàng
                                </a>
                            </h2>
                        </div>
                        <div id="payment-address-content" class="panel-collapse collapse in">
                            <div class="panel-body row">
                                <div class="col-md-6 col-sm-6">
                                    <h3>Thông tin khách hàng</h3>
                                    <div class="form-group">
                                        <label for="firstname">Họ và tên<span class="require">*</span></label>
                                        <input
                                            type="text"
                                            value="{{$user->hovaten}}"
                                            disabled
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Số điện thoại<span class="require">*</span></label>
                                        <input type="text"
                                               value="{{$user->sodienthoai}}"
                                               disabled
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail <span class="require">*</span></label>
                                        <input type="text"
                                               disabled
                                               value="{{$user->email}}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Địa chỉ<span class="require">*</span></label>
                                        <input type="text"
                                               value="{{$user->diachi}}"
                                               disabled
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h3>Thông tin nhận hàng</h3>
                                    <div class="form-group">
                                        <label for="company">Người nhận</label>
                                        <input
                                            type="text"
                                            value="{{$user->hovaten}}"
                                            name="name_order"
                                            required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address1">Số điện thoại</label>
                                        <input
                                            type="text"
                                            name="phone_order"
                                            required
                                            value="{{$user->sodienthoai}}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address2">Địa chỉ nhận hàng</label>
                                        <input
                                            type="text"
                                            name="address_order"
                                            required
                                            value="{{$user->diachi}}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAYMENT ADDRESS -->
                    <!-- BEGIN SHIPPING METHOD -->
{{--                    <div id="shipping-method" class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h2 class="panel-title">--}}
{{--                                <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">--}}
{{--                                    Bước 2: Phương thức thanh toán--}}
{{--                                </a>--}}
{{--                            </h2>--}}
{{--                        </div>--}}
{{--                        <div id="shipping-method-content" class="panel-collapse collapse">--}}
{{--                            <div class="panel-body row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <p>Please select the preferred shipping method to use on this order.</p>--}}
{{--                                    <h4>Flat Rate</h4>--}}
{{--                                    <div class="radio-list">--}}
{{--                                        <label>--}}
{{--                                            <input type="radio" name="FlatShippingRate" value="FlatShippingRate"> Flat Shipping Rate--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="delivery-comments">Add Comments About Your Order</label>--}}
{{--                                        <textarea id="delivery-comments" rows="8" class="form-control"></textarea>--}}
{{--                                    </div>--}}
{{--                                    <button class="btn btn-primary  pull-right" type="submit" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- END SHIPPING METHOD -->

                    <!-- BEGIN PAYMENT METHOD -->
                    <div id="payment-method" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                                    Bước 2: Phương thức thanh toán
                                </a>
                            </h2>
                        </div>
                        <div id="payment-method-content" class="panel-collapse collapse">
                            <div class="panel-body row">
                                <div class="col-md-12">
                                    <p>Chọn phương thức thanh toán của bạn</p>
                                    <div class="radio-list">
                                        <label>
                                            <input
                                                type="radio"
                                                checked
                                                name="payment_method"
                                                value="1"
                                            > Trả tiền mặt
                                        </label>
                                        <label>
                                            <input
                                                type="radio"
                                                name="payment_method"
                                                value="2"
                                            > Momo
                                        </label>
                                        <label>
                                            <input
                                                type="radio"
                                                name="payment_method"
                                                value="3"
                                            > Thanh toán online
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAYMENT METHOD -->

                    <!-- BEGIN CONFIRM -->
                    <div id="confirm" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                    Bước 3: Xác nhận đơn hàng
                                </a>
                            </h2>
                        </div>
                        <div id="confirm-content" class="panel-collapse collapse">
                            <div class="panel-body row">
                                <div class="col-md-12 clearfix">
                                    <div class="table-wrapper-responsive">
                                        <table summary="Shopping cart" style="width: 100%">
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
                                                            <img src="{{asset($product['img'])}}"
                                                                 alt="Berry Lace Dress">
                                                        </a>
                                                    </td>

                                                    <td class="goods-page-description">
                                                        <h3><a href="javascript:;">{{$product['name']}}</a></h3>
                                                        <p>
                                                            <strong>Thông tin: </strong>
                                                            Size: {{$product['size']}}
                                                        </p>
                                                    </td>
                                                    <td class="goods-page-price">
                                                        <strong>
                                                            {{$product['quality']}}
                                                        </strong>
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
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="checkout-total-block">
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
                                            <li>
                                                <em>Giảm giá</em>
                                                <strong class="price" id="price_sale">
                                                    0 VNĐ
                                                </strong>
                                            </li>
                                            <li class="shopping-total-price">
                                                <em>Phải trả</em>
                                                <strong class="price" id="price_left">
                                                    {{number_format($total)}}
                                                    VNĐ
                                                </strong>
                                            </li>
                                            <li class="shopping-total-price" id="code-sale-wrapper">
                                                <div class="input-group mb-3" id="input_code_sale">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Mã giảm giá"
                                                        id="sale_code"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="button-addon2">
                                                    <button
                                                        class="btn btn-outline-secondary"
                                                        type="button"
                                                        onclick="handleApplySale({{$total}})"
                                                        id="btn-apply">Áp dụng</button>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Xác nhận</button>
                                    <button type="button" class="btn btn-default pull-right margin-right-20">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONFIRM -->
                </div>
                <!-- END CHECKOUT PAGE -->
            </div>
            <!-- END CONTENT -->
        </form>
        <!-- END SIDEBAR & CONTENT -->
    </div>
@endsection
