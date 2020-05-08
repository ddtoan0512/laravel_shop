@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
  <h1 class="pt-3">Quản lý sản phẩm <a href="{{ route('admin.get.create.product') }}" class="float-right"><i class="fas fa-plus-circle"></i></a></h1>
  <div class="table-responsive">
    <form class="form-inline">
      <div class="form-group mx-sm-3 mb-2">
      <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm..." value="{{ Request::get('name')}}">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <select name="cate" class="form-control">
          <option value="">Danh mục</option>
          @if(isset($categories))
            @foreach ($categories as $category)
              <option value="{{$category->id}}" {{ \Request::get('cate') == $category->id ? 'selected' : ''}} >{{$category->c_name}}</option>
            @endforeach
          @endif
        </select>
      </div>
      <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button>
    </form>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên sản phẩm</th>
          <th>Loại sản phẩm</th>
          <th>Trạng thái</th>
          <th>Nổi bật</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($products))
          @foreach ($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>
                {{$product->pro_name}}
                <ul style="list-style: none; padding-left: 15px">
                  <li><span><i class="fas fa-dollar-sign"></i></span>120.000<span></span></li>
                </ul>
              </td>
              <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
              <td>
              <a href="{{ route('admin.get.action.product', ['active', $product->id])}}" class="badge {{$product->getStatus($product->pro_active)['class'] }}">{{$product->getStatus($product->pro_active)['name'] }}</a>
              </td>
              <td>
                <a href="{{ route('admin.get.action.product', ['hot', $product->id])}}" class="badge {{$product->getHot($product->pro_hot)['class'] }}">{{$product->getHot($product->pro_hot)['name'] }}</a>
              </td>
              <td>
                <a style="padding: 5px 10px" href="{{ route('admin.get.edit.product', $product->id) }}" ><i class="far fa-edit fa-2x"></i>Cập nhật</a>
                <a style="padding: 5px 10px" href="{{ route('admin.get.action.product', ['delete', $product->id]) }}"><i class="far fa-trash-alt fa-2x mr-1"></i>Xoá</a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
@stop