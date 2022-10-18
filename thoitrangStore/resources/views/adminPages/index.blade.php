<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đồ án luận văn</title>

    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/"/>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="{{asset('system/admin/plugins/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet"
          href="{{asset('system/admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" href="{{asset('system/admin/plugins/bower_components/chartist/dist/chartist.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('system/admin/css/style.min.css')}}">

</head>
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    @include('adminPages.layout.header.index')

    @include('adminPages.layout.sidebar.index')

    <div class="page-wrapper">

        @section('content') @show



        @include('adminPages.layout.footer.index')
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>


{{-----------------------------------------------------------------------------------}}
<script src="{{asset('system/admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('system/admin/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('system/admin/js/app-style-switcher.js')}}"></script>
<script src="{{asset('system/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<script src="{{asset('system/admin/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('system/admin/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('system/admin/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('system/admin/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script
    src="{{asset('system/admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('system/admin/js/pages/dashboards/dashboard1.js')}}"></script>


</body>
</html>
