@extends('admin.layout')
@section('title','dashboard')

@section('content')
@include('admin.header')
<div style="width:80vw;margin:20px auto">
    <p>Your name: {{ $user->name}}</p>
    <p>Your role: {{ $user->role == 1 ? 'Admin (Can Delete)' : 'User (Read-Only)'}}</p>
    <div class="admin-container">
        <div class="table" style="flex:2">
            <p style="color:{{session('color')}};text-transform:capitalize">
                {{session('confirmation')}}
            </p>
        @if(isset($msg) && $msg=='categories')
        <table border="1" width="100%" cellspacing="0" cellpading="5px">
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
                 @method('put')                    <input type="text" 
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
        @else
        @if(isset($msg) && $msg=='products')
        @foreach($products as $product)
        <p>{{$product->product_name}}</p>
        @endforeach
        @endif
        @endif


    </div>
</div>
@endsection