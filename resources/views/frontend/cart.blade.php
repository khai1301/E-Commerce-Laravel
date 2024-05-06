@extends('master')
@section('title','Giỏ Hàng')
@section('main')
@if (session('error'))
<div class="alert alert-danger" role="alert">
        {{ session('error') }}
</div>
@endif
<div class="title" style="background-image: url(/img/thanh.png);margin-top: 15px; color: #fff; height:160px; background-size: cover;">
    <div class="flex-row container">
        <div class="left-title">
            <nav class="title-main" >
                <h1 href="" style="color: #fff;  padding-top: 20px;"><a href="{{ route('home') }}" style="color: #fff; text-decoration: none; ">TRANG CHỦ</a> / GIỎ HÀNG</h1>
            </nav>
        </div>
    </div>
</div>
@include('frontend.cart_component')
<script>
    function cartUpdate(event){
        event.preventDefault();
        let urlUpdate = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();
        
        $.ajax({
            type: "GET",
            url: urlUpdate,
            data: {
                id: id,
                quantity: quantity,
            },
            success: function (data) {
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Cập nhật thành công')
                }
            }, error: function() {

            }
        });
    }

    function cartDelete(event){
        event.preventDefault();
        let urlDelete = $('.cart_wrapper').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: urlDelete,
            data: {
                id: id,
            },
            success: function (data) {
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Xóa thành công');
                }
            }, error: function() {

            }
        });
    }
    $(function(){
        $(document).on('click', '.cart_update', cartUpdate);
        $(document).on('click', '.cart_delete', cartDelete);
    })
</script>
<script>
    function vnpay_form(){
        document.getElementById("vnpay").style.display='block';
    }
</script>
@stop