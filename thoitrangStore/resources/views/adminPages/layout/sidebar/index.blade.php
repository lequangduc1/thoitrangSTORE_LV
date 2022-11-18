<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.dashboard.index')}}"
                       aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.account.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Danh sách tài khoản</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.customers.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lí khách hàng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{route('admin.order.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-archive" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lý đơn hàng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.promotion.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-address-card" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lí khuyến mãi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.information.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-cogs" aria-hidden="true"></i>
                        <span class="hide-menu">Thông tin wesbite</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.importcoupon.index')}}"
                       aria-expanded="false">
                        <i class="fas fa-cogs" aria-hidden="true"></i>
                        <span class="hide-menu">Quản lí phiêu nhập</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <ul class=" w3-dropdown-hover">
                        <a class="sidebar-link sidebar-item " href="#"
                           aria-expanded="false">
                            <i class="fab fa-product-hunt" aria-hidden="true"></i>
                            <span class="hide-menu">Quản lí sản phẩm</span>
                        </a>
                        <div class="w3-dropdown-content w3-bar-block ">
                            <a href="{{route('admin.products.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Sản phẩm</i>
                            </a>
                            <a href="{{route('admin.producttype.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Loại sản phẩm</i>
                            </a>
                            <a href="{{route('admin.productcolor.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Màu sản phẩm</i>
                            </a>
                            <a href="{{route('admin.productsize.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Kích thước sản phẩm</i>
                            </a>
                        </div>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <ul class=" w3-dropdown-hover">
                        <a class="sidebar-link sidebar-item " href="#"
                           aria-expanded="false">
                            <i class="fab fa-product-hunt" aria-hidden="true"></i>
                            <span class="hide-menu">Quản lí đơn hàng</span>
                        </a>
                        <div class="w3-dropdown-content w3-bar-block ">
                            <a href="{{route('admin.importcoupon.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Danh sách đơn</i>
                            </a>
                            <a href="{{route('admin.importcoupon.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Loại sản phẩm</i>
                            </a>
                            <a href="{{route('admin.importcoupon.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Màu sản phẩm</i>
                            </a>
                            <a href="{{route('admin.productsize.index')}}" class="sidebar-link sidebar-item">
                                <i class="fas fa-angle-double-right"> Kích thước sản phẩm</i>
                            </a>
                        </div>
                    </ul>
                </li>

                <li class="text-center p-20 upgrade-btn" style="padding: 20px">
                    <a href="{{route('admin.logout')}}"
                       class="btn d-grid btn-danger text-white"
                    >
                        Đăng xuất
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
