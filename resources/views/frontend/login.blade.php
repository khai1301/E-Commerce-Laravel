<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập
    </title>
    <link rel="stylesheet" href="{{ asset('css/navbar/login.css') }}">
</head>
<body>
    @if(session('message'))
        <span class="alert alert-danger">
            <strong>{{ session('message') }}</strong>
        </span>
    @endif
<div class="title" style="background-image: url(/img/thanh.png);margin-top: 15px; color: #fff; height:160px; background-size: cover;">
    <div class="flex-row container">
        <div class="left-title">
            <nav class="title-main" >
                <h1 href="login.html" style="color: #fff;  padding-top: 20px;"><a href="{{ route('home') }}" style="color: #fff; text-decoration: none; ">TRANG CHỦ</a> / ĐĂNG NHẬP</h1>
            </nav>
        </div>
    </div>
</div>
    <div class="login" style="margin-top: 30px;">
        <h3 class="h3">Đăng nhập</h3>
        <form action="" method="POST">
            @csrf
            @include('errors.note')
            <p>
                <label for="" class="lb">Tên tài khoản hoặc địa chỉ email&nbsp;
                    <span>*</span>
                </label>
                <input type="text" name="email" id="tk">
            </p>
            <p>
                <label for="" class="lb">Mật khẩu&nbsp;
                    <span>*</span>
                </label>
                <input type="password" name="password" id="mk">
            </p>
            <p class="form_row">
                <button type="submit" name="login" value="Đăng nhập" class="btdn" onclick="dangnhap()">Đăng nhập</button>
                
                <label for="" id="sub_form">
                    <input type="checkbox" name="" id="checkbox" value="forever">
                    <span>Ghi nhớ mật khẩu</span>
                </label>
            </p>
            <p>
                <a href="" class="a">Quên mật khẩu ?</a>
            </p>
            <p style="text-decoration: none;
            color: #1c1c1c;
            font-size: 20px;">Bạn chưa có tài khoản ?
                <a class="abt" href="{{ route('dangky') }}" style="">ĐĂNG KÝ NGAY</a>
            </p>
        </form>
    </div>

</body>
</html>