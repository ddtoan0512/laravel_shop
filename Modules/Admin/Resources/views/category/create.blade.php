@extends('admin::layouts.master')
@section('content')
    <div class="pt-3">
        <div class="row">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="h5">Tên danh mục</label>
                <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{ old('name') }}">
                </div>
                @if ($errors->has('name'))
                  <div class="alert alert-danger" role="alert">
                    {{$errors->first('name')}}
                  </div>
                @endif

                <div class="form-group">
                  <label for="name" class="h5">Icon</label>
                  <input type="text" class="form-control" placeholder="fa fa-home" name="icon">
                </div>
                @if ($errors->has('icon'))
                  <div class="alert alert-danger" role="alert">
                    {{$errors->first('icon')}}
                  </div>
                @endif

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="hot">
                    <label class="form-check-label" for="exampleCheck1" >Nổi bật</label>
                  </div>
                <button type="submit" class="btn btn-success">Tạo mới</button>
              </form>
        </div>
    </div>
@endsection