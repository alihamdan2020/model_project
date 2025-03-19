@extends('layout')

@section('title','details')

@section('content')
<div class="product_details">
    <div class="photo" style="background-image:url('{{$product->product_photo}}')"></div>
    <div class="info">
        <p><label>Product name</label>{{$product->product_name}}</p>
        <p><label>price</label>{{$product->product_price}}</p>
        <p><label>description</label>{{$product->product_description}}</p>
        <p><label for="">availabe colors</label></p>
        @for ($i = 1; $i <= 3; $i++)
            <div class="color" style="background-color: {{ $product->{"color$i"} }};">
    </div>
    @endfor
    <p><label>category</label>{{$product->category->category_name}}</p>
    <p style="text-align: center">
        <a href="{{route('home')}}" style="margin:0">
            <button>home<i class="fa-solid fa-house"></i></button></a>
    </p>
</div>


</div>
@endsection