<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký
    </title>
    <link rel="stylesheet" href="{{ asset('css/navbar/login.css') }}">
</head>
<body>
    <div class="title" style="background-image: url({{ asset('img/thanh.png') }});margin-top: 15px; color: #fff; height:160px; background-size: cover;">
        <div class="flex-row container">
            <div class="left-title">
                <nav class="title-main" >
                    <h1  style="color: #fff;  padding-top: 20px;"><a href="{{ route('home') }}" style="color: #fff; text-decoration: none; ">TRANG CHỦ</a> /ĐĂNG KÝ</h1>
                </nav>
            </div>
        </div>
    </div>
        
        <div class="login" style="margin-top: 30px;">
            <h3 class="h3">Đăng ký</h3>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                @include('errors.note')
                <p>
                    <label for="" class="lb">Họ và tên&nbsp;
                        <span>*</span>
                    </label>
                    <input type="text" name="name" id="tk" value="">
                    @if($errors->has('name')) 
                        {{ $errors->first('name') }} 
                    @endif
                </p>
                <p>
                    <label for="" class="lb">Địa chỉ email&nbsp;
                        <span>*</span>
                    </label>
                    <input type="text" name="email" id="tk" value="">
                    @if($errors->has('email')) 
                        {{ $errors->first('email') }} 
                    @endif
                </p>
                <p>
                    <label for="" class="lb">Giới tính&nbsp;
                        <span>*</span>
                    </label>
                    <input type="text" name="gender" id="tk" value="">
                    @if($errors->has('gender')) 
                        {{ $errors->first('gender') }} 
                    @endif
                </p>
                <p>
                    <label for="" class="lb">Mật khẩu&nbsp;
                        <span>*</span>
                    </label>
                    <input type="password" name="password" id="mk">
                    @if($errors->has('password')) 
                        {{ $errors->first('password') }} 
                    @endif
                </p>
                <p>
                    <label for="" class="lb">Xác nhận mật khẩu&nbsp;
                        <span>*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="mk">
                    @if($errors->has('password_confirmation')) 
                        {{ $errors->first('password_confirmation') }} 
                    @endif
                </p>
                <p class="form_row">
                    <button type="submit" name="login" value="Đăng ký" class="btdn" >Đăng ký</button>
                </p>
                <p style="text-decoration: none;
                color: #1c1c1c;
                font-size: 20px;">Bạn đã có tài khoản ?
                    <a class="abt" href="{{ route('login') }}" style="">ĐĂNG NHẬP NGAY</a>
                </p>
            </form>
        </div>
</body>
</html>