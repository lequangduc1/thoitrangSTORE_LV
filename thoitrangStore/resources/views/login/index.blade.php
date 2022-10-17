<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('login/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <form action="">
        <h3>Đăng nhập</h3>
        <div class="form-group">
            <input type="text" name="email" required  value="admin@gmail.com">
            <label for="">Email</label>
        </div>
        <div class="form-group">
            <input type="password" name="password" required value="123456">
            <label for="">Mật khẩu</label>
        </div>
        <input type="submit" value="Đăng nhập" id="btn-login">
    </form>
</div>
</body>
</html>
