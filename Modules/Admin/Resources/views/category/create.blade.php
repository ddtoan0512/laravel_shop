@extends('admin::layouts.master')
@section('content')
    <div class="pt-3">
        <div class="row">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="h5">Tên danh mục</label>
                  <input type="text" class="form-control" placeholder="Tên danh mục" name="name">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="hot">
                    <label class="form-check-label" for="exampleCheck1" >Nổi bật</label>
                  </div>
                <button type="submit" class="btn btn-success">Tạo mới</button>
              </form>
        </div>
    </div>
@endsection