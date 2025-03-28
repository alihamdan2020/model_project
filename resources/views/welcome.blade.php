@extends ('layout')

@section('title','index page')

@section('content')
<div class="container">
    <nav>
        <a href="{{route('home')}}">all</a>
        @foreach ($categories as $category)
        <a href="{{route('showSpecCategory',$category->category_id)}}"
        class="{{ (int)request()->segment(2) === (int)$category->category_id ? 'active' : '' }}">
        {{$category->category_name}}
        

        </a>
        @endforeach
    </nav>
    @foreach ($products as $key=>$categoryProducts)
    <div class="section">
        <h3>{{$key}}</h3>
        <div class="card_holder" style="display: flex;">
        @foreach ($categoryProducts as $product)
            <div class="card">
                <img src="{{asset('images').'/'.$product->product_photo}}">
                <p>{{$product->product_name}}</p>
                <p>{{$product->product_price}} $</p>
                <p>{{$product->category_name}}</p>
                <a href="{{url('show',$product->product_id)}}" style="margin:0">show more</a>
            </div>
            @endforeach
        </div>
    </div>
        @endforeach
</div>
@endsection