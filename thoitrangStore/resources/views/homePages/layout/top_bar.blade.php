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
                    <li><a href="shop-account.html">My Account</a></li>
                    <li><a href="shop-wishlist.html">My Wishlist</a></li>
                    <li><a href="shop-checkout.html">Checkout</a></li>
                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                        <li><a href="{{route('home.auth.logout')}}">Log out</a></li>
                    @else
                        <li><a href="{{route('home.auth.login_form')}}">Log In</a></li>
                    @endif
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
