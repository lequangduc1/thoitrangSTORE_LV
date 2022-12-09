<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="{{ asset('login/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('system/admin/css/mystyle.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        form{
            width: 400px;
        }
        input{
            width: 100% !important;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <form action="{{route('home.auth.register')}}" method="POST" >
        <h3>Đăng ký</h3>
        @csrf
        <div class="form-group">
            <input type="text" name="hovaten" autocomplete="off" required >
            <label for="">Họ và Tên<span class="input__required">*</span></label>
        </div>
        <div class="form-group">
            <input type="email" name="email" autocomplete="off" required >
            <label for="">Email<span class="input__required">*</span></label>
        </div>
        <div class="form-group">
            <input type="password" name="password" autocomplete="new-password" required >
            <label for="">Mật khẩu<span class="input__required">*</span></label>
        </div>
        <div class="form-group">
            <input type="password" name="repassword" autocomplete="new-password" required >
            <label for="">Nhập lại mật khẩu<span class="input__required">*</span></label>
        </div>
        <div class="form-group">
            <input type="text" name="sodienthoai" autocomplete="off" required >
            <label for="">Số điện thoại<span class="input__required">*</span></label>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <input type="submit" value="Đăng ký" id="btn-login">
        <span style="font-size: 14px; margin: 5px 0px;display: block">Bạn đã có tài khoản <a href="{{route('home.auth.login_form')}}">Đăng nhập</a></span> <br>

    </form>
</div>
</body>
</html>
