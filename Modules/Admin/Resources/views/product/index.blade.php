@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
  <h1 class="pt-3">Quản lý sản phẩm <a href="{{ route('admin.get.create.product') }}" class="float-right">Thêm mới</a></h1>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên sản phẩm</th>
          <th>Loại sản phẩm</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($products))
          @foreach ($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->pro_name}}</td>
              <td>{{$product->pro_category_id}}</td>
              <td>
              <a href="#" class="badge {{$product->getStatus($product)['class'] }}">{{$product->getStatus($product)['name'] }}</a>
              </td>
              <td>
                <a href="{{ route('admin.get.edit.product', $product->id) }}" >Edit</a>
                <a href="{{ route('admin.get.action.product', ['delete', $product->id]) }}">Delete</a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
@stop