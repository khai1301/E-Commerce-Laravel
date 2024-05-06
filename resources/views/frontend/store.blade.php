@extends('master')
@section('title','Cửa Hàng')
@section('main')
<div class="title">
    <div class="flex-row container">
        <div class="left-title">
            <nav class="title-main" >
                <a href="{{ route('home') }}" style="font-weight: 100">Trang Chủ</a>
                <span style="font-weight: 100">/</span>
                CỬA HÀNG
            </nav>
        </div>
        
    </div>
</div>
<main id="main">
    <div class="row main" style="padding-bottom: 50px">
        <div class="col large-3 left-main">
            <aside class="main1">
                <span >Danh mục sản phẩm</span>
                <div class="menu-dmsp">
                    <ul class="menu_category" style="margin-bottom: 0px;">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('laysptheoloai',$category->name) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
            </aside>
            <aside class="main1">
                <span for="amount" style="padding-left:55px">Lọc sản phẩm</span>
                <div class="menu-dmsp">
                    <form action="" style="
                    background-color: #fff;
                    padding-top: 25px;text-align:center">
                        <div id="slider-range">
                        </div>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;text-align:center">
                        <input type="submit" name="filter_price" id="" value="Tìm kiếm" class="btn btn-primary">
                        <input type="hidden"  name="start_price" id="start_price">
                        <input type="hidden"  name="end_price" id="end_price">
                    </form>
                </div>
            </aside>
        </div>

        <div class="col large-9">
        <div class="row1" >
            @foreach ($products as $prd)
                <div class="pr" >
                    <div class="">
                        <img width="2048" height="2048" src="{{ $prd->image }}" alt="" id="pr">
                    </div>
                    <div class="namepr">
                        <a href="">{{ $prd->name }}</a>
                    </div>
                    <div class="price">
                        <p>{{ number_format($prd->price) }}đ</p>
                    </div>
                    <div class="add">
                        @csrf <a  href="#" data-url="{{ route('addcart', ['id'=>$prd->id]) }}" id="add" class="add_to_cart">Thêm vào giỏ</a>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="" style="display: flex; justify-content: center">{{ $products->links('pagination::bootstrap-4') }}</div>
    </div>
    </div>
</main>

<script>
    function addTocart(event){
        event.preventDefault();
        let urlCart = $(this).data('url');
        
        $.ajax({
            
            type: "GET",
            url: urlCart,
            
            dataType: 'json',
            success: function (data) {
                if(data.code === 200){
                    alert('Thêm sản phẩm thành công')
                }
            },
            error:function (){

            }
        });
    }
    $(function () {
        $('.add_to_cart').on('click', addTocart)
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $( "#slider-range" ).slider({
      orientation: "horizontal",
      range: true,
      max: {{ $max_price }} + 100000,
      min: {{ $min_price }} - 20000,
      step:1000,
      values: [ {{ $min_price }}, {{ $max_price }} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + "đ" + " - " + ui.values[ 1 ] + "đ") ;
        $( "#start_price" ).val( ui.values[ 0 ] );
        $( "#end_price" ).val( ui.values[ 1 ] ) ;
      }
    });
    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + "đ" +
      " - " + $( "#slider-range" ).slider( "values", 1 )+ "đ" ) ;
    });
</script>
@stop