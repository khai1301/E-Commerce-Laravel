<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/layout/style.css') }}">
</head>
<body>
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
                                            if ($cartItem['totalquantity'] > $cartItem['quantity']) {
                                                $totalPrice += $cartItem['price'] * $cartItem['quantity'];
                                            }
                                        @endphp
                                        <tr class="bo">
                                            <th>{{ $id }}</th>
                                            <td><img src="{{  $cartItem['image'] }}" style="width: 50px; height: 50px"/> </td>
                                            <td>{{ $cartItem['name'] }}</td>
                                            @if ($cartItem['totalquantity'] > $cartItem['quantity'])
                                                <td class="status">Còn hàng</td>
                                                <input type="text" name="status" id="" value="Còn hàng" style="display: none">
                                                @else <td class="status">Hết hàng</td>
                                                <input type="text" name="status" id="" value="Hết hàng" style="display: none">
                                            @endif
                                            <td><input readonly="true" class="form-control quantity" type="number" min="1" value="{{ $cartItem['quantity'] }}" /></td>
                                            <td class="text-right" id="price1">{{ number_format($cartItem['price']) }} <span>đ</span></td>
                                            {{-- <td><a href="" data-id="{{ $id }}" class="btn btn-primary cart_update">Cập nhật</a></td>
                                            <td><a href="" data-id="{{ $id }}" class="btn btn-danger cart_delete">Xóa</a></td> --}}
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
                                    <td></td>
                                    <td></td>
                                </tr>
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
                        
                            {{-- <button class="btn btn-block btn-success" onclick="location.href='{{ route('getHistory', Auth::user()->id) }}'">Thông tin đơn hàng đã mua</button> --}}
                        </div>
                        {{-- <div class="col-sm-12 col-md-3 text-right" >
                            <button onclick="payment_form()" class="btn btn-lg btn-block btn-success text-uppercase" style="font-size: 19px">Thanh toán thủ công</button> --}}
                            {{-- <form action="{{ route('vnpay_payment') }}" method="POST">
                                @csrf
                                <button type="submit" name="redirect" class="btn btn-lg btn-block btn-success text-uppercase">Thanh toán VNPay</button>
                            </form> --}}
                        {{-- </div> --}}
                        {{-- <div class="col-sm-12 col-md-3 text-right">
                            <form action="{{ route('vnpay_payment', Auth::user()->id) }}" method="POST">
                                @csrf
                                <div class="" style="display: none">
                                    <tbody style="text-align:center;" class="cart_box" >
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @if ($carts != null)
                                            @foreach ($carts as $id=> $cartItem)
                                                @php
                                                    if ($cartItem['totalquantity'] > $cartItem['quantity']) {
                                                        $totalPrice += $cartItem['price'] * $cartItem['quantity'];
                                                    }
                                                @endphp
                                                <tr class="bo">
                                                    <th>{{ $id }}</th>
                                                    <input type="text" name="" id="" value="{{ $id }}">
                                                    <td><img src="{{  $cartItem['image'] }}" style="width: 50px; height: 50px"/> </td>
                                                    <td>{{ $cartItem['name'] }}</td>
                                                    <input type="text" name="" id="" value="{{ $cartItem['name'] }}">
                                                    @if ($cartItem['totalquantity'] > $cartItem['quantity'])
                                                        <td class="status">Còn hàng</td>
                                                        <input type="text" name="status" id="" value="Còn hàng" style="display: none">
                                                        @else <td class="status">Hết hàng</td>
                                                        <input type="text" name="status" id="" value="Hết hàng" style="display: none">
                                                    @endif
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
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                                </div>
                                <button type="submit" name="redirect" class="btn btn-lg btn-block btn-success text-uppercase">Thanh toán VNPay</button>
                            </form>
                        </div> --}}
                        {{-- <div class="col-sm-12  col-md-12">
                            <button class="btn btn-block btn-success" onclick="location.href=''">Thông tin thanh toán</button>
                        </div> --}}
                        <div class="col-sm-12 col-md-12 text-right" style="padding-left: 330px">
                            <div id="checkout" class="login" style="margin-top: 30px;">
                                <h3 class="h3">Thông tin thanh toán</h3>
                              
                                {{-- @foreach ($customer_infor as $infor) --}}
                                <form action="{{ route('savePayment', Auth::user()->id) }}" method="POST">
                                    {{-- @foreach ($customer_infor as $customer) --}}
                                        @csrf
                                        @include('errors.note')
                                        <p>
                                            <label for="" class="lb">Địa chỉ email&nbsp;
                                                <span>*</span>
                                            </label>
                                            <input type="text" name="shipping_email" id="mk" value="">
                                        </p>
                                        <p>
                                            <label for="" class="lb">Tên&nbsp;
                                                <span>*</span>
                                            </label>
                                            <input type="text" name="shipping_name" id="mk" value="">
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
                                            <textarea type="textarea" name="shipping_note" id="mk" style="width: 805px; height: 60px"> </textarea>
                                        </p>
                                        {{-- <p>
                                            <button type="submit" onclick="payment_form()">Gửi</button>
                                        </p> --}}
                                        <input type="hidden" name="totalPrice" id="" value="{{ number_format($totalPrice) }} " readonly="true" >
                                            <p>
                                                <label for="" class="lb">Phương thức thanh toán&nbsp;
                                                    <span>*</span>
                                                </label>
                                                <div class="payment_option">
                                                    <span>
                                                        <label for=""><input type="radio" value="1" name="payment_option" id="">Thanh toán khi nhận hàng</label>
                                                    </span> <br>
                                                    <span>
                                                        <label for=""><input type="radio" value="2" name="payment_option" id="">Thanh toán bằng thẻ ATM</label>
                                                    </span>
                                                </div>
                                            </p>
                                        <button id="btn_checkout" class="btn btn-lg btn-block btn-success text-uppercase" onclick="checkout_form()">Thanh toán </button>        
                                    {{-- @endforeach --}}
                                    </form>
                                {{-- </form> --}}
                                {{-- @endforeach --}}
                            </div>
                                {{-- <form action="{{ route('savePayment', Auth::user()->id) }}" method="POST"></form> --}}
                                </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>