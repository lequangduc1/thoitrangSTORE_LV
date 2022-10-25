<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
        <link rel="stylesheet" href="{{asset('system/homePages/img/favicon.ico')}}">
    <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('system/homePages/lib/flaticon/font/flaticon.css')}}">
    <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{asset('system/homePages/lib/owlcarousel/assets/owl.carousel.min.css')}}">
    <!-- Customized Bootstrap Stylesheet -->
        <link rel="stylesheet" href="{{asset('system/homePages/css/bootstrap.min.css')}}">
    <!-- Template Stylesheet -->
        <link rel="stylesheet" href="{{asset('system/homePages/css/style.css')}}">
</head>

<body>
    <!-- header -->
        @include('homePages.layout.header.index')
    <!-- header -->




    @section('content') @show




<!-- Footer Start -->
    @include('homePages.layout.footer.index')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>
<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('system/homePages/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('system/homePages/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('system/homePages/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Template Javascript -->
    <script src="{{asset('system/homePages/js/main.js')}}"></script>

</body>

</html>
