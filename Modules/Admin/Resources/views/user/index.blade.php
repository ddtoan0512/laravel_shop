@extends('admin::layouts.master')
@section('content')
<h1 class="pt-3">Quản lý thành viên </h1>
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
      @if (isset($categories))
      @foreach ($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->c_name}}</td>
        <td>{{$category->c_title_seo}}</td>
        <td>
          <a href="#">{{$category->getStatus($category->c_active)['name']}}</a>
        </td>
        <td>
          <a href="{{ route('admin.get.edit.category', $category->id) }}">Edit</a>
          <a href="{{ route('admin.get.action.category', ['delete', $category->id]) }}">Delete</a>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
@stop