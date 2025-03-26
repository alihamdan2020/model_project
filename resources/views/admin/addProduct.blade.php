<div class="addcontent" style="flex:1">
    <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="group-controls">
            <label for="product_name">product name</label>
            <input type="text" name="prodName" id="product_name">
            <p style="color:Red">
                    @error('prodName')
                    {{$message}}
                    @enderror
                </p>
        </div>
        <div class="group-controls">
            <label for="product_photo">product photo</label>
            <input type="file" name="product_photo" id="product_photo">
            <p style="color:Red">
                    @error('product_photo')
                    {{$message}}
                    @enderror
                </p>
        </div>
        <div class="group-controls">
            <label for="product_price">product price</label>
            <input type="text" name="product_price" id="product_price">
            <p style="color:Red">
                    @error('product_price')
                    {{$message}}
                    @enderror
                </p>
        </div>
        <div class="group-controls">
            <label for="category_name">category</label>
            <div class="group-controls-select">
                <select name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->category_id}}">
                        {{$category->category_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group-controls">
            <div class="colors" style="display:flex">
            <label for=""># 1</label>
            <input type="color" name="color1" id="">
            &nbsp;<label for=""># 2</label>
            <input type="color" name="color2" id="">
            &nbsp;<label for=""># 3</label>
            <input type="color" name="color3" id="">
            </div>
        </div>
        <div class="group-controls">
            <label for="product_desc">description</label>
        <textarea name="product_description" id="product_desc">this is a product description</textarea>
        </div>


        <div class="group-controls moremargin">
            <button type="submit">add new product</button>
        </div>
        <p style="color:Red">
            @error('catName')
            {{$message}}
            @enderror
        </p>
    </form>
</div>