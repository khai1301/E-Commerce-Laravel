@extends('master')
@section('title','Cửa Hàng')
@section('main')
<div class="title">
    <div class="flex-row container">
        <div class="left-title">
            <nav class="title-main" >
                <a href="{{ route('home') }}" style="font-weight: 100">TRANG CHỦ</a>
                <span style="font-weight: 100">/</span>
                CỬA HÀNG
            </nav>
        </div>
        
    </div>
</div>
<main id="main">
    <div class="row main">
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
            <!-- width="100" height="100" sizes="(max-width: 100px) 100vw, 100px"  -->
            
        </div>
        <div class="col large-9">
        <div class="row1" >
            @foreach ($products_type as $prd)
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
    </div>
    </div>
</main>

<script>
    function addTocart(event){
        event.preventDefault();
        let urlCart = $(this).data('url');
        // $.ajaxSetup({

        //     headers: {

        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        //     }

        // });
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
    // $(".add_to_cart").click(function(){
    // });
</script>
@stop