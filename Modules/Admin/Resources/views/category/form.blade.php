<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="h5">Tên danh mục</label>
    <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{ old('name', isset($category->c_name) ? $category->c_name : '' ) }}">
    </div>
    @if ($errors->has('name'))
        <div class="alert alert-danger" role="alert">
        {{$errors->first('name')}}
        </div>
    @endif

    <div class="form-group">
        <label for="name" class="h5">Meta title</label>
    <input type="text" class="form-control" placeholder="Meta title" name="c_title_seo" 
        value="{{ old('c_title_seo', isset($category->c_title_seo) ? $category->c_title_seo : '') }}">
    </div>
    {{-- @if ($errors->has('name'))
        <div class="alert alert-danger" role="alert">
        {{$errors->first('c_title_seo')}}
        </div>
    @endif --}}
    
    <div class="form-group">
        <label for="name" class="h5">Meta Dexcription</label>
    <input type="text" class="form-control" placeholder="Meta Description" name="c_description_seo" value="{{ old('c_description_seo', isset($category->c_description_seo) ? $category->c_description_seo : '') }}">
    </div>
    {{-- @if ($errors->has('name'))
        <div class="alert alert-danger" role="alert">
        {{$errors->first('name')}}
        </div>
    @endif --}}

    <div class="form-group">
        <label for="name" class="h5">Icon</label>
    <input type="text" class="form-control" placeholder="fa fa-home" name="icon" value="{{ old('icon', isset($category->c_icon) ? $category->c_icon : '') }}">
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
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>