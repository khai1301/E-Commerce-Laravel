@extends('master')
@section('main')
@section('title', 'Trang chủ')

@if (session('error'))
<div class="alert alert-danger" role="alert">
        {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<!-- banner-->
<div class="banner">
    <img src="https://food.unl.edu/newsletters/images/fresh-vegetables-basket.png" alt="" id="banner">
    <nav>
        <p id="p">TÌM MUA <b id="b">THỰC PHẨM SẠCH</b> TỪ <b id="b"><br>
            NHÀ CUNG CẤP UY TÍN</b> TẠI ĐÂY</p>
    </nav>
</div>

<div class="">
    <div class="content">
    <p id="p1" style="margin: 20px 0px"><b>Mua sản phẩm lựa chọn từ vườn</b></p>
</div>

<div class="row" style="padding-bottom: 50px">
    @foreach ($categories as $category)
        <div class="menubot large">
            <div class="menubot1 text-center" style="">
                <a href="{{ route('laysptheoloai',$category->name) }}">
                    <div class="container">
                        <img src="{{ $category->image }}" alt="" class="image">
                    </div>
                    <div class="space" style="display:block; height: auto; padding-top: 20px;"></div>
                    <h3>
                        <a href="{{ route('laysptheoloai',$category->name) }}" id="text-menu">{{ $category->name }}</a>
                    </h3>
                </a>
            </div>
        </div>
    @endforeach
</div>
</div>



<div class="" style="background-color: #fafafa">
    <div class="content">
        <p id="p1"><b>Sản phẩm nổi bật</b></p>
    </div>
    <!-- popular product-->
    {{-- <div class="row1"> --}}
        <div id="formList">
            <div id="list">
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
                            <a href="{{ route('getDetails', [$product->id, $product->category_id]) }}" id="add">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    {{-- </div>  --}}
    <div class="direction">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
</div>

{{-- <div class="content">
    <p id="p1"><b>Cam kết của chúng tôi</b></p>
</div> --}}
<!-- slide show-->

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
                                <input class="button" type="submit" value="Đăng ký">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script language="javascript">
    document.getElementById('next').onclick = function(){
        const widthItem = document.querySelector('.pr').offsetWidth;
        document.getElementById('formList').scrollLeft += widthItem;
    }
    document.getElementById('prev').onclick = function(){
        const widthItem = document.querySelector('.pr').offsetWidth;
        document.getElementById('formList').scrollLeft -= widthItem;
    }
</script>
@stop