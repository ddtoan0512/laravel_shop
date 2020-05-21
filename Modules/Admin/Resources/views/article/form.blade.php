<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name" class="h5">Tên bài viết</label>
    <input type="text" class="form-control" placeholder="Tên bài viết" name="a_name"
      value="{{ old('a_name', isset($article->a_name) ? $article->a_name : '' ) }}">
  </div>
  @if ($errors->has('a_name'))
  <div class="alert alert-danger" role="alert">
    {{$errors->first('a_name')}}
  </div>
  @endif

  <div class="form-group">
    <label for="a_description" class="h5">Mô tả:</label>
    <textarea name="a_description" class="form-control" placeholder="Mô tả bài viết" cols="30"
      rows="3">{{ old('a_description', isset($article->a_description) ? $article->a_description : '') }}      </textarea>
  </div>
  @if ($errors->has('a_description'))
  <div class="alert alert-danger" role="alert">
    {{$errors->first('a_description')}}
  </div>
  @endif

  <div class="form-group">
    <label for="a_content" class="h5">Nội dung:</label>
    <textarea name="a_content" class="form-control" placeholder="Nội dung bài viết" cols="30"
      rows="3">{{ old('a_description', isset($article->a_content) ? $article->a_content : '') }}</textarea>
  </div>
  @if ($errors->has('a_content'))
  <div class="alert alert-danger" role="alert">
    {{$errors->first('a_content')}}
  </div>
  @endif

  <div class="form-group">
    <label for="a_title_seo" class="h5">Meta Title</label>
    <input type="text" class="form-control" placeholder="Meta Title" name="a_title_seo"
      value="{{ old('a_title_seo', isset($article->a_title_seo) ? $article->a_title_seo : '') }}">
  </div>

  <div class="form-group">
    <label for="a_description_seo" class="h5">Meta Description</label>
    <input type="text" class="form-control" placeholder="Meta Description" name="a_description_seo"
      value="{{ old('a_description_seo', isset($article->a_description_seo) ? $article->a_description_seo : '') }}">
  </div>

  <div class="form-group">
    <label for="avatar" class="h5">Avatar</label>
    <input type="file" name="avatar" class="form-control" />
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="hot">
    <label class="form-check-label" for="exampleCheck1">Nổi bật</label>
  </div>
  <button type="submit" class="btn btn-success">Cập nhật</button>
</form>