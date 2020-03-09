<form action="" method="POST">
    @csrf
    <div class="row pt-3">
        <div class="col-md-8">
            <div class="form-group">
                <label for="pro_name" class="h5">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="pro_name" value="{{ old('pro_name', isset($product->pro_name) ? $product->pro_name : '' ) }}">
            </div>
            @if ($errors->has('pro_name'))
                <div class="alert alert-danger" role="alert">
                {{$errors->first('pro_name')}}
                </div>
            @endif
            
            <div class="form-group">
                <label for="pro_description" class="h5">Mô tả</label>
                <textarea name="pro_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả sản phẩm"></textarea>
            </div>
            @if ($errors->has('pro_description'))
                <div class="alert alert-danger" role="alert">
                {{$errors->first('pro_description')}}
                </div>
            @endif
            
            <div class="form-group">
                <label for="pro_content" class="h5">Nội dung</label>
                <textarea name="pro_content" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung"></textarea>
            </div>

            <div class="form-group">
                <label for="pro_title_seo" class="h5">Meta Title</label>
                <input type="text" class="form-control" placeholder="Meta Title" name="pro_title_seo" value="{{ old('pro_title_seo', isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}">
            </div>

            <div class="form-group">
                <label for="name" class="h5">Meta Description</label>
                <input type="text" class="form-control" placeholder="Meta Description" name="pro_description_seo" value="{{ old('pro_description_seo', isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}">
            </div>
            
        <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="pro_category_id" class="h5">Loại sản phẩm</label>
            <select name="pro_category_id" id="pro_category_id" class="form-control">
                <option value="">--Chọn loại sản phẩm--</option>
            </select>
        </div>
        @if ($errors->has('pro_category_id'))
            <div class="alert alert-danger" role="alert">
            {{$errors->first('pro_category_id')}}
            </div>
        @endif
        

        <div class="form-group">
            <label for="pro_price" class="h5">Giá sản phẩm</label>
            <input type="number" placeholder="Giá sản phẩm" name="pro_price" class="form-control">
        </div>
        @if ($errors->has('pro_price'))
            <div class="alert alert-danger" role="alert">
            {{$errors->first('pro_price')}}
            </div>
        @endif

        <div class="form-group">
            <label for="pro_sale" class="h5">% khuyến mãi</label>
            <input type="number" placeholder="%giảm giá" name="pro_sale" class="form-control" value="0">
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