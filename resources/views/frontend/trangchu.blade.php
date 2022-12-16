@extends('master')
@section('main')
@section('title', 'Trang chủ')


<!-- banner-->
<div class="banner">
    <img src="https://food.unl.edu/newsletters/images/fresh-vegetables-basket.png" alt="" id="banner">
    <nav>
        <p id="p">TÌM MUA <b id="b">THỰC PHẨM SẠCH</b> TỪ <b id="b"><br>
            NHÀ CUNG CẤP UY TÍN</b> TẠI ĐÂY</p>
    </nav>
</div>

{{-- <div class="content">
    <p id="p1"><b>Mua sản phẩm lựa chọn từ vườn</b></p>
</div> --}}
<!-- list category -->
{{-- <div class="container">
   <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide" style="width: 18%">
                <div class="image-box">
                    <img src="img\index_cate_1.png" alt="">
                </div>
                <div class="profile-details">
                    <img src="" alt="">
                    <div class="name-category">
                        <h3 class="name">Rau củ</h3>
                    </div>
                </div>
            </div>
            <div class="card swiper-slide" style="width: 18%">
                <div class="image-box">
                    <img src="img\index_cate_1.png" alt="">
                </div>
                <div class="profile-details">
                    <img src="" alt="">
                    <div class="name-category">
                        <h3 class="name">Rau củ</h3>
                    </div>
                </div>
            </div>
            <div class="card swiper-slide" style="width: 18%">
                <div class="image-box">
                    <img src="img\index_cate_1.png" alt="">
                </div>
                <div class="profile-details">
                    <img src="" alt="">
                    <div class="name-category">
                        <h3 class="name">Rau củ</h3>
                    </div>
                </div>
            </div>
            <div class="card swiper-slide" style="width: 18%">
                <div class="image-box">
                    <img src="img\index_cate_1.png" alt="">
                </div>
                <div class="profile-details">
                    <img src="" alt="">
                    <div class="name-category">
                        <h3 class="name">Rau củ</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div> 
</div> --}}


{{-- <div class="content">
    <p id="p1"><b>Chương trình khuyến mãi</b></p>
</div> --}}
<!-- promotion-->
{{-- <div class="row">
    <div class="km large1">
        <div class="km1">
            <img src="img\km1.png" alt="" class="img">
        </div>
    </div>
    <div class="km large1">
        <div class="km1">
            <img src="img\km2.jpg" alt="" class="img">
        </div>
    </div>
    <div class="km large1">
        <div class="km1">
            <img src="img\km3.jpg" alt="" class="img">
        </div>
    </div>
    <div class="km large1">
        <div class="km1">
            <img src="img\km4.png" alt="" class="img">
        </div>
    </div>
</div> --}}

<div class="content">
    <p id="p1"><b>Sản phẩm nổi bật</b></p>
</div>
<!-- all product-->
<div class="row1">
    @foreach ($products as $product)
    <div class="pr" >
        <div class="">
            <img width="2048" height="2048" src="{{ $product -> image }}" alt="" id="pr">
        </div>
        <div class="namepr">
            <p href="giohang.html">{{ $product -> name }}</p>
        </div>
        <div class="price">
            <p>{{ number_format($product -> price) }} đ</p>
        </div>
        <div class="add">
            <a href="giohang.html" id="add">Thêm vào giỏ</a>
        </div>
    </div>
    @endforeach
</div> 

<div class="more">
    <a href="cuahang.html" id="more">Xem thêm</a>
</div>
<div class="content">
    <p id="p1"><b>Cam kết của chúng tôi</b></p>
</div>
<!-- slide show-->
<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="./img/slide1.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade">
        <img src="./img/slide2.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade">
        <img src="./img/slide3.jpg" style="width:100%">
    </div>
    
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    
</div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>
<section class="subcribe " style="padding-top: 60px;">
    <div class="subcribe-background">
        <div class="subcribe-container">
            <div class="row-sub">
                <div class="col-sub">
                    <h2>Đăng ký</h2>
                    <p>Đăng ký để nhận được được thông tin mới nhất từ chúng tôi.</p>
                    <div class="input-mail-sub">
                        <form action="" class="input">
                            <div class="form-group">
                                <input type="text" class="text-mail" placeholder="Enter email">
                                <input class="button" type="submit" value="Đăng ký"></input>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop