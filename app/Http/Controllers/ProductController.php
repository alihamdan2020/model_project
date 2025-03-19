<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   function index(){
    // $products=Product::all();
    $products=Product::join
    ('categories','products.category_id','categories.category_id')->select('products.*','category_name')->limit(5)->get();
    return view('welcome',compact('products'));
   }

   function show($id){
      $product=Product::with('category')->find($id);
      // dd($product->color3);
      $msg="this is the details of the product".$product->product_name;
      return view('productDetails',compact('product','msg'));
   }
}
