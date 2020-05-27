@extends('layouts.app')
@section('content')
<div class="our-product-area new-product">
  <div class="container">
    <div class="area-title">
      <h2>Giỏ hàng</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Thành tiền</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        @foreach ($products as $key => $product)
        <tr>
          <td>{{ $i++ }}</td>
          <td scope="row">{{ $product->name }}</td>
          <td>
            <img src="{{ pare_url_file($product->options->avatar) }}" style="height: 70px; width: 80px;">
          </td>
          <td> {{ number_format($product->price, 0, ',', '.') }} </td>
          <td> {{ $product->qty }} </td>
          <td> {{ number_format($product->qty * $product->price,0,',','.') }} đ</td>
          <td>
            <a href=""> <i class="fa fa-pencil"></i> Edit</a>
            <a href=""> <i class="fa fa-trash-o"></i> Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h2 class="pull-right">Tổng tiền {{ Cart::subtotal() }} <a href="" class="btn btn-success">Thanh toán</a> </h2>

  </div>
</div>

@stop