@extends('admin::layouts.master')
@section('content')
<h1 class="pt-3">Quản lý thành viên </h1>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Tên hiển thị</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Hình ảnh</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @if (isset($users))
      @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>
          <img src="{{ pare_url_file($user->avatar) }}" alt="" class="img img-responsive"
            style="width: 80px; height: 80px;">
        </td>
        <td>
          <a style="padding: 5px 10px" href="{{ route('admin.get.edit.product', $user->id) }}"><i
              class="far fa-edit fa-2x"></i>Cập nhật</a>
          <a style="padding: 5px 10px" href="{{ route('admin.get.action.product', ['delete', $user->id]) }}"><i
              class="far fa-trash-alt fa-2x mr-1"></i>Xoá</a>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
@stop