@extends ('layout')

@section('title','index page')

@section('content')
<div class="container">
    @foreach ($products as $product)
    <div class="card">
        <img src="{{$product->product_photo}}">
        <p>{{$product->product_name}}</p>
        <p>{{$product->product_price}} $</p>
        <p>{{$product->category_name}}</p>
        <a href="{{url('show',$product->product_id)}}" style="margin:0">show more</a>
    </div>
    @endforeach
    </div>
@endsection