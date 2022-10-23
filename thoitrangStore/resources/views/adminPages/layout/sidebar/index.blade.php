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
