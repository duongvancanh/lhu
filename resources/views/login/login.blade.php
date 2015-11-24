<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
<div class="thongbao">
    @if(Session::has('flash_message'))
        <div class="alert alert-{{Session::get('flash_level')}}">
            {{ Session::get('flash_message') }}
        </div>
    @endif
</div>
<div class="wrapper">
    <div class="container">
        <form class="form" action="/dangnhap" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="text" name="user" placeholder="Tên Đăng Nhập" id="username">
            <input type="password" name="pass" placeholder="Mật Khẩu" id="password">
            <button type="submit" id="login-button">Đăng Nhập</button>
        </form>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="/js/index.js"></script>


</body>
</html>
