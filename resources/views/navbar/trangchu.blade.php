<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Fresh Organic Food</title>
        <link rel="stylesheet" href="{{ asset('css/navbar/style.css') }}">
    </head>
    <body>
        <div id="wrapper">
            <header class="header">
                <div class="top-bar" >
                    <div class="flex-row container">
                        <div class="flex-left">
                            <ul class="ul-left" >
                            </ul>
                        </div>
                        <div class="flex-center">
                            <ul class="ul-center"></ul>
                        </div>
                       
                        
                    </div>
                </div>
                <div  class="header-main">
                    @include('header2')
                    <div class="banner">
                        <img src="img\banner.jpg" alt="" id="banner">
                        <nav class="btmn">
                            <form action="" >
                                <button >MUA NGAY</button>
                            </form>
                        </nav>
                        <nav>
                            <p id="p">TÌM MUA <b id="b">THỰC PHẨM SẠCH</b> TỪ <b id="b"><br>
                                NHÀ CUNG CẤP UY TÍN</b> TẠI ĐÂY</p>
                        </nav>
                    </div>
                    <div class="content">
                        <p id="p1"><b>Mua sản phẩm lựa chọn từ vườn</b></p>
                    </div>
                    <div class="row">
                        <div class="menubot large">
                            <div class="menubot1 text-center">
                                <div class="container">
                                    <img src="img\index_cate_1.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a href="cuahang.html" id="text-menu">Rau củ</a>
                                </h3>
                            </div>
                        </div>
                        <div class="menubot large">
                            <div class="menubot2 text-center">
                                <div class="container">
                                    <img src="img\index_cate_2.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a  href="cuahang.html" id="text-menu">
                                        {{-- @foreach ($listingConfigs as $listingConfig )
                                            {{$listingConfig->name}}
                                        @endforeach --}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="menubot large">
                            <div class="menubot3 text-center">
                                <div class="container">
                                    <img src="img\index_cate_3.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a href="cuahang.html" id="text-menu">Thịt trứng</a>
                                </h3>
                            </div>
                        </div>
                        <div class="menubot large">
                            <div class="menubot4 text-center">
                                <div class="container">
                                    <img src="img\index_cate_4.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a href="cuahang.html" id="text-menu">Trái cây</a>
                                </h3>
                            </div>
                        </div>
                        <div class="menubot large">
                            <div class="menubot5 text-center">
                                <div class="container">
                                    <img src="img\index_cate_5.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a href="cuahang.html" id="text-menu">Đồ khô</a>
                                </h3>
                            </div>
                        </div>
                        <div class="menubot large">
                            <div class="menubot6 text-center">
                                <div class="container">
                                    <img src="img\index_cate_6.png" alt="" class="image">
                                </div>
                                <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                                <h3>
                                    <a href="cuahang.html" id="text-menu">Đồ uống</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <p id="p1"><b>Chương trình khuyến mãi</b></p>
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="content">
                        <p id="p1"><b>Sản phẩm nổi bật</b></p>
                    </div>
                    <div class="row1">
                                
                        @foreach ($featured_product as $featured_product )
                        <div class="pr" >
                            <div class="">
                                <img width="2048" height="2048" src="{{$featured_product->image}}" alt="" id="pr">
                            </div>
                            <div class="namepr">
                                <a href="giohang.html">{{$featured_product->name}}</a>
                            </div>
                            <div class="price">
                                <p>{{$featured_product->price}} đ</p>
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
                    <!-- Footer -->
                    @include('footer')
                </div>
            </header>
        </div>
        <!-- js nav -->
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector(".header-menu");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
        </script>
        <!--js slide show-->
        <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
            <!--auto slide show-->
            <script>
                let slideIndex1 = 0;
                showSlides();
                
                function showSlides() {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slideIndex1++;
                  if (slideIndex1 > slides.length) {slideIndex1 = 1}    
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex1-1].style.display = "block";  
                  dots[slideIndex1-1].className += " active";
                  setTimeout(showSlides, 3000); // doi anh moi 2s
                }
                </script>
    </body>
</html>