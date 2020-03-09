@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
  <h1 class="pt-3">Quản lý sản phẩm <a href="{{ route('admin.get.create.product') }}" class="float-right">Thêm mới</a></h1>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên danh mục</th>
          <th>Title Seo</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>
@stop