<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        {{-- <base href="{{ asset('public/css') }}/"> --}}
        <link rel="stylesheet" href="{{ asset('css/layout/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .sub-cart{
                position: absolute;
                z-index: 100;
                width: 60%;
                right: -25px;
            }
            tr{
                background-color: #fff;
            }
            ul#main-cart .sub-cart{
        display: none;
    }
    ul#main-cart li:hover .sub-cart{
        display: block;
    }

        </style>
    </head>
    <body >
        <div id="wrapper">
            <header class="header">
                <div  class="header-main" >
                    <!-- nav bar-->
                    <header class="header-menu">
                        <div class="" class="header-menu">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                    <a href="{{ route('home') }}" class="navbar-brand"><img src="img/logo5.png" alt="" style="height: 70px;"></a>
                                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                        <div class="navbar-nav">
                                            <a href="{{ route('home') }}" class="nav-item nav-link active">Trang Chủ</a>
                                            <a href="" class="nav-item nav-link">Cửa Hàng</a>
                                            <div class="nav-item dropdown">
                                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Giới Thiệu</a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Inbox</a>
                                                    <a href="#" class="dropdown-item">Sent</a>
                                                    <a href="#" class="dropdown-item">Drafts</a>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <button type="button" class="btn btn-secondary"><i class="bi-search"></i></button>
                                            </div>
                                        </form>
                                        @if(Auth::guest())
                                            <div class="navbar-nav">
                                                <a href="{{ route('login') }}" class="nav-item nav-link">Đăng Nhập</a>
                                            </div>
                                        @endif
                                        @if(Auth::check())
                                            <div class="navbar-nav">
                                                <p style="margin-bottom: 0px" href="" class="nav-item nav-link">Xin chào {{ Auth::user()->name }}</p>
                                                <a href="{{ route('getcart') }}"><button type="button" class="btn btn-secondary cart" ><i class="bi-cart"></i></button></a>
                                                
                                            </div>
                                            <div class="navbar-nav">
                                                <a href="{{ asset('logout') }}" class="nav-item nav-link">Đăng Xuất</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </header>

            @yield('main')

            <footer class="text-center text-lg-start bg-light text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                    <span>Liên hệ với chúng tôi:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                    <a href="facebook.com/khailm10" class="me-4 text-reset ">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-github"></i>
                    </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Fresh Organic Food
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Sản phẩm
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Danh mục
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
                        <p><i class="bi bi-house me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="bi bi-envelope me-3"></i>
                            khaipn.21it@vku.udn.vn
                        </p>
                        <p><i class="bi bi-phone me-3"></i> + 01 234 567 88</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    </div>
                </section>
                </footer>  
            </div>
        <!--js nav-->
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector(".header-menu");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
        </script>  

    </body>
</html>