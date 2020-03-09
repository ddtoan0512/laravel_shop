<form action="" method="POST">
    @csrf
    <div class="row pt-3">
        <div class="col-md-8">
            <div class="form-group">
                <label for="name" class="h5">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" value="{{ old('name', isset($category->c_name) ? $category->c_name : '' ) }}">
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                {{$errors->first('name')}}
                </div>
            @endif
            
            <div class="form-group">
                <label for="name" class="h5">Mô tả</label>
                <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả sản phẩm"></textarea>
            </div>
            
            <div class="form-group">
                <label for="name" class="h5">Nội dung</label>
                <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung"></textarea>
            </div>

            <div class="form-group">
                <label for="name" class="h5">Meta Dexcription</label>
                <input type="text" class="form-control" placeholder="Meta Description" name="c_description_seo" value="{{ old('c_description_seo', isset($category->c_description_seo) ? $category->c_description_seo : '') }}">
            </div>
            
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="name" class="h5">Loại sản phẩm</label>
            <select name="" id="" class="form-control">
                <option value="">--Chọn loại sản phẩm--</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="h5">Giá sản phẩm</label>
            <input type="number" placeholder="Giá sản phẩm" class="form-control">
        </div>

        <div class="form-group">
            <label for="name" class="h5">% khuyến mãi</label>
            <input type="number" placeholder="%giảm giá" class="form-control">
        </div>

        <div class="form-group">
            <label for="name" class="h5">Avatar</label>
            <input type="file" name="avatar" class="form-control" />
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="hot">
            <label class="form-check-label" for="exampleCheck1" >Nổi bật</label>
        </div>
            
        </div>
    </div>
</form>