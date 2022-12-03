@extends('master')
@section('title', 'Giỏ hàng')
@section('main')

<div class="container mb-4" style="box-shadow: 3px 3px 20px 0 rgb(0 0 0 / 15%);padding-left: 15px; margin-top: 20   px">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-right">Giá</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bo">
                            <td><img src="./img/bo.jpeg" style="width: 50px; height: 50px"/> </td>
                            <td>Bơ</td>
                            <td>Còn hàng</td>
                            <td><input class="form-control" type="number" min="1" value="1" /></td>
                            <td class="text-right" id="price1">135.000 <span>đ</span></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="./img/cabasa.jpg" style="width: 50px; height: 50px"/> </td>
                            <td>Cá</td>
                            <td>Còn hàng</td>
                            <td><input class="form-control" type="number" min="1" value="1" /></td>
                            <td class="text-right" id="price2">75.000 <span>đ</span></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="./img/buoi.jpg" style="width: 50px; height: 50px"/> </td>
                            <td>Bưởi</td>
                            <td>Còn hàng</td>
                            <td><input class="form-control" type="number" min="1" value="1" /></td>
                            <td class="text-right" id="price3">75.000 <span>đ</span></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tổng phụ</td>
                            <td class="text-right" >285.000 <span>đ</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Phí giao hàng</td>
                            <td class="text-right" id="ship">35.000 <span>đ</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Tổng thanh toán</strong></td>
                            <td class="text-right " id="total"><strong>320.000 <span>đ</span></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-success" onclick="cuahang.html">Tiếp tục mua sắm</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right" style="padding-left: 330px">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Thanh toán  </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop