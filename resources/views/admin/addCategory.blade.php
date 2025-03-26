<div class="addcontent" style="flex:1">
            <form action="{{route('add-category')}}" method="post">
                @csrf
                <div class="group-controls">
                    <label for="category_name">category name</label>
                    <input type="text" name="catName" id="category_name">
                </div>
                <div class="group-controls moremargin">
                    <button type="submit">add new category</button>
                </div>
                <p style="color:Red">
                    @error('catName')
                    {{$message}}
                    @enderror
                </p>
            </form>
        </div>