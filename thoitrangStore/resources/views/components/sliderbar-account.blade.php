<!-- BEGIN SIDEBAR -->
<div class="sidebar col-md-3 col-sm-3">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        <li class="list-group-item clearfix {{ Request::is('account') ? 'active' : '' }}">
            <a href="{{route('home.account.index')}}"><i class="fa fa-angle-right "></i>Thông tin tài khoản</a>
        </li>
        <li class="list-group-item clearfix {{ (Request::is('account/order-list') || Request::is('account/order-detail')) ? 'active' : '' }}">
            <a href="{{route('home.account.order-list')}}"><i class="fa fa-angle-right"></i>Đơn hàng</a>
        </li>
    </ul>
</div>
<!-- END SIDEBAR -->
