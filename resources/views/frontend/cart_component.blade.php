
<div class="cart_wrapper" data-url="{{ route('deletecart') }}">
    <div class="container mb-4" style="box-shadow: 3px 3px 20px 0 rgb(0 0 0 / 15%);padding-left: 15px; margin-top: 20   px">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped update_cart_url" data-url="{{ route('updatecart') }}">
                        <thead>
                            <tr style="text-align:center">
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-right">Đơn giá</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center" class="cart_box">
                            @php
                                $totalPrice = 0;
                            @endphp
                            @if ($carts != null)
                                @foreach ($carts as $id=> $cartItem)
                                    @php
                                        $totalPrice += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                    <tr class="bo">
                                        <th>{{ $id }}</th>
                                        <td><img src="{{  $cartItem['image'] }}" style="width: 50px; height: 50px"/> </td>
                                        <td>{{ $cartItem['name'] }}</td>
                                        <td>Còn hàng</td>
                                        <td><input class="form-control quantity" type="number" min="1" value="{{ $cartItem['quantity'] }}" /></td>
                                        <td class="text-right" id="price1">{{ number_format($cartItem['price']) }} <span>đ</span></td>
                                        <td><a href="" data-id="{{ $id }}" class="btn btn-primary cart_update">Cập nhật</a></td>
                                        <td><a href="" data-id="{{ $id }}" class="btn btn-danger cart_delete">Xóa</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tổng phụ</td>
                                <td class="text-right" >{{ number_format($totalPrice) }} <span>đ</span></td>
                            </tr>
                            {{-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Phí giao hàng</td>
                                <td class="text-right" id="ship">35.000 <span>đ</span></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Tổng thanh toán</strong></td>
                                <td class="text-right " id="total"><strong>{{ number_format($totalPrice) }} <span>đ</span></strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <button class="btn btn-block btn-success" onclick="location.href='{{ route('home') }}'">Tiếp tục mua sắm</button>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right" style="padding-left: 330px">
                        <button id="btn_checkout" class="btn btn-lg btn-block btn-success text-uppercase" onclick="checkout_form()">Thanh toán  </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
