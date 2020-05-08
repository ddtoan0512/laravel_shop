@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
  <h1 class="pt-3">Quản lý bài viết <a href="{{ route('admin.get.create.article') }}" class="float-right"><i class="fas fa-plus-circle"></i></a></h1>
  <div class="table-responsive">
    <form class="form-inline">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control" name="name" placeholder="Tên bài viết..." value="{{ Request::get('name')}}">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <select name="cate" class="form-control">
          <option value="">Danh mục</option>
          @if(isset($categories))
          @foreach ($categories as $category)
          <option value="{{$category->id}}" {{ \Request::get('cate') == $category->id ? 'selected' : ''}}>{{$category->c_name}}</option>
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
          <th>Tên bài viết</th>
          <th>Mô tả</th>
          <th>Trạng thái</th>
          <th>Ngày tạo</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($articles))
        @foreach ($articles as $article)
        <tr>
          <td>{{$article->id}}</td>
          <td>{{$article->a_name}}</ul>
          </td>
          <td>{{ $article->a_description }}</td>
          <td>
            <a href="{{ route('admin.get.action.article', ['active', $article->id])}}" class="badge {{$article->getStatus($article->a_active)['class'] }}">{{$article->getStatus($article->a_active)['name'] }}</a>
          </td>
          <td>{{ $article->created_at }}</td>
          <td>
            <a style="padding: 5px 10px" href="{{ route('admin.get.edit.article', $article->id) }}"><i class="far fa-edit fa-2x"></i>Cập nhật</a>
            <a style="padding: 5px 10px" href="{{ route('admin.get.action.article', ['delete', $article->id]) }}"><i class="far fa-trash-alt fa-2x mr-1"></i>Xoá</a>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
@stop