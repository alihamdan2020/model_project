<div class="table" style="flex:2">
<table  width="100%" cellspacing="0" cellpading="5px">
            <tr height="50px">
                <th>product id</td>
                <th>product name</td>
                <th>product photo</td>
                <th>product category</th>
                <th>product price</th>
            </tr>
            @foreach($products as $product)
            <tr>
            <th>{{$product->product_id}}</td>
            <th><img style="width:100px" src="{{asset('images').'/'.$product->product_photo}}"></td>
            <th>{{$product->product_name}}</td>
            <th>{{$product->category_name}}</td>
            <th>{{$product->product_price}}</td>
            </tr>
            @endforeach
    </table>
</div>