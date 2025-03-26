<div class="table" style="flex:2">
<table  width="100%" cellspacing="0" cellpading="5px">
                <tr height="50px">
                    <th>category id</td>
                    <th>category name</td>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                @foreach($categories as $category)
                <tr height="50px">
                    <th>{{$category->category_id}}</th>
                    <th>{{$category->category_name}}</th>
                    <th>
                        <form action="{{route('updateCategory',$category->category_id)}}" method="POST">
                            @csrf
                            @method('put') <input type="text"
                                value="{{$category->category_name}}"
                                name="category_name"></input>
                            <button>update</button>
                        </form>
                    </th>
                    @if($user->role==1)
                    <th><a href="{{route('deleteCategory',$category->category_id)}}" class="btn btn-danger" onclick="return confirm('are you sure you want delete ?')">delete</a></th>
                    @else
                    <th><a href="#" class="btn btn-danger" style="pointer-events: none;">delete</a></th>
                    @endif
                </tr>
                @endforeach
            </table>
</div>            