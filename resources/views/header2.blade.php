<header class="header">
    <div class="top-bar">
        <div class="flex-row container">
            <div class="flex-left">
                <ul class="ul-left">
                    <li class="header-contact-wrapper">
                        <ul id="header-contact" class="ul-contact">
                            <li class><img src="img\email.jpg" alt="" id="img-email"></li>
                            <li class>
                                <i class="icon-email" style="font-size: 16px;"></i>
                                <a href="mailto:khaihacang123@gmail.com" class="email">
                                    <span id="email">khuett.21it@vku.udn.vn</span>
                                </a>
                                <span id="gach">|</span>
                            </li>
                            <li class><img src="img\download.jpg" alt="" id="img-phone"></li>
                            <li class>
                                <a href="tel:0919016614" class="phone">
                                    <i class="icon-phone"></i>
                                    <span id="phone">&nbsp;0342291355</span>

                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex-center">
                <ul class="ul-center"></ul>
            </div>
            <div class="flex-right">
                <ul class="ul-right">
                    <li class="account">
                        <a href="{{ route('login.') }}">
                            <span id="account">Đăng nhập / Đăng ký </span>
                        </a>
                        <span id="gach">|</span>
                    </li>
                    <li class="giohang">
                        <a href="/DACS1/giohang.html" title="Giỏ hàng">
                            <span class="header-cart-title" id="giohang">Giỏ hàng
                            </span>
                            <i class="icon-shopping-cart">

                            </i>

                        </a>
                        <ul class="nav-dropdown nav-dropdown-simple" style>
                            <li class="html widget_shopping_cart">
                                <div class="widget_shopping_cart_content"></div>
                            </li>

                        </ul>

                    </li>
                    <li class="img-giohang"><img src="img\giohang1.jpg" alt="" id="img-giohang"></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="header-main">
        <header class="header-menu">
            <div class="flex-headermain container">

                <div class="flex-col logo" id="logo">
                    <a href="index.html"><img width="400px" height="50px" src="img\logo1.jpg" alt=""
                            id="img-logo"></a>
                </div>
                <div class="menu">
                    <ul class="menu-header">
                        <li class="menubar1">
                            <a href="/" class="menu-link">Trang chủ</a>
                        </li>
                        <li class="menubar1">
                            <a href="{{ route('cuahang.') }}" class="menu-link">Cửa hàng</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category )
                                    <li><a href="">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="menubar1">
                            <a href="{{ route('gioithieu.') }}" class="menu-link">Giới thiệu</a>
                        </li>
                        <li class="menubar1">
                            <a href="/" class="menu-link">Danh bạ nhà nông</a>
                        </li>
                        <li class="menubar1">
                            <a href="/" class="menu-link">kiến thức</a>
                        </li>
                        
                </div>
                <div class="header-search">
                    <div class="searchform">
                        <form action="" role="search" method="get" class="searchform">
                            <input type="search" class="search" value placeholder="Tìm kiếm...">
                        </form>
                    </div>
                </div>

            </div>
        </header>
