<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@section('title') @show</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{asset('/system/homePages/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{asset('/system/homePages/assets/pages/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{asset('/system/homePages/assets/pages/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/pages/css/slider.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/pages/css/style-shop.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/system/homePages/assets/corporate/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/assets/corporate/css/themes/red.css')}}" rel="stylesheet" id="style-color">
    <link href="{{asset('/system/homePages/assets/corporate/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('/system/homePages/css/style.css')}}" rel="stylesheet">

    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
            <li class="color-red current color-default" data-style="red"></li>
            <li class="color-blue" data-style="blue"></li>
            <li class="color-green" data-style="green"></li>
            <li class="color-orange" data-style="orange"></li>
            <li class="color-gray" data-style="gray"></li>
            <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
    </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->


@include('homePages.layout.top_bar');
@include('homePages.layout.header.index');
@include('homePages.layout.slider');

<div class="main">
    @section('content') @show
</div>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/canon.jpg')}}" alt="canon" title="canon"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/esprit.jpg')}}" alt="esprit" title="esprit"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/gap.jpg')}}" alt="gap" title="gap"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/next.jpg')}}" alt="next" title="next"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/puma.jpg')}}" alt="puma" title="puma"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/zara.jpg')}}" alt="zara" title="zara"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/canon.jpg')}}" alt="canon" title="canon"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/esprit.jpg')}}" alt="esprit" title="esprit"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/gap.jpg')}}" alt="gap" title="gap"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/next.jpg')}}" alt="next" title="next"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/puma.jpg')}}" alt="puma" title="puma"></a>
            <a href="shop-product-list.html"><img src="{{asset('system/homePages/assets/pages/img/brands/zara.jpg')}}" alt="zara" title="zara"></a>
        </div>
    </div>
</div>

@include('homePages.layout.footer.index');

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('system/homePages/js/script.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/plugins/respond.min.js')}}"></script>
<script src="{{asset('system/homePages/assets/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/corporate/scripts/back-to-top.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="{{asset('system/homePages/assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
<script src="{{asset('system/homePages/assets/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
<script src='{{asset('system/homePages/assets/plugins/zoom/jquery.zoom.min.js')}}' type="text/javascript"></script><!-- product zoom -->
<script src="{{asset('system/homePages/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->

<script src="{{asset('system/homePages/assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('system/homePages/assets/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
