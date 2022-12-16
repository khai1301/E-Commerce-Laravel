@extends('master')
@section('title','Giỏ Hàng')
@section('main')
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
<div id="checkout" class="login" style="margin-top: 30px;">
    <h3 class="h3">Thông tin thanh toán</h3>
    @foreach ($customer_infor as $infor)
        <form action="{{ route('saveCheckout',Auth::user()->id) }}" method="POST">
            @csrf
            @include('errors.note')
            <p>
                <label for="" class="lb">Địa chỉ email&nbsp;
                    <span>*</span>
                </label>
                <input type="text" name="shipping_email" id="mk" value="{{ $infor->email }}">
            </p>
            <p>
                <label for="" class="lb">Tên&nbsp;
                    <span>*</span>
                </label>
                <input type="text" name="shipping_name" id="mk" value="{{ $infor->name }}">
            </p>
            <p>
                <label for="" class="lb">Địa chỉ&nbsp;
                    <span>*</span>
                </label>
                <input type="text" name="shipping_address" id="mk">
            </p>
            <p>
                <label for="" class="lb">Điện thoại&nbsp;
                    <span>*</span>
                </label>
                <input type="text" name="shipping_phone" id="mk">
            </p>
            <p>
                <label for="" class="lb">Ghi chú&nbsp;
                    <span>*</span>
                </label>
                <textarea type="textarea" name="shipping_note" id="mk" style="width: 833px; height: 60px"> </textarea>
            </p>
            <p class="form_row">
                <button type="submit" name="send_order" value="Gửi" class="btdn" >Gửi</button>
            </p>
            
        </form>
    @endforeach
</div>
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
    function checkout_form(){
        document.getElementById("checkout").style.display='block';
    }
</script>
@stop