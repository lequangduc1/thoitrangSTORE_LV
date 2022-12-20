<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>{{getInformation('dien_thoai')}}</span></li>
                    <!-- BEGIN CURRENCIES -->
                    <li class="shop-currencies">
                        <span>{{getInformation('email')}}</span>
                    </li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li>
                        <a href="{{route('home.account.index')}}">Tài khoản</a>
                    </li>
                    <li>
                        <a href="shop-wishlist.html">Danh sách yêu thích</a>
                    </li>
                    <li>
                        <a href="shop-checkout.html">Thanh toán</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                        <li><a href="{{route('home.auth.logout')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('home.auth.login_form')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
