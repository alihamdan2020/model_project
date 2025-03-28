<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProductController extends Controller
{
   function index(){
    // $products=Product::all();
    $categories= Category::whereIn('category_id', function ($query) {
      $query->select('category_id')
            ->distinct()
            ->from('products');
  })->get();
  
  $products = Product::join('categories', 'products.category_id', '=', 'categories.category_id')
  ->select('products.*', 'categories.category_name')
  ->get()
  ->groupBy('category_name');  // Group products by category
//   dd($products);
  return view('welcome',compact('products','categories'));
   }

   function show($id){
      $product=Product::with('category')->find($id);
      // dd($product->color3);
      $msg="this is the details of the product".$product->product_name;
      return view('productDetails',compact('product','msg'));
   }

   

public function indexAdmin()
{
    $user = Auth::user(); // Get logged-in user
    $products = Product::join('categories', 'products.category_id', 'categories.category_id')
        ->select('products.*', 'category_name')
        // ->limit(5)
        ->get();
    $msg = "products";
    $categories=Category::all();
    return view('admin.dashboard', compact('products', 'msg', 'user','categories'));
}

public function add_product(Request $r){
   $r->validate([
    'prodName'=>'required',
    'product_price'=>'required|numeric|min:1|decimal:0,2',
    'product_photo'=>'required|mimes:jpg,jpeg,png'
   ]);
   $r["product_name"]=$r->prodName;
   $data=$r->only(['product_name','product_price','category_id','color1','color2','color3','product_description']);

   $file = $r->product_photo;
   // $file = $r->input('product_photo'); same above
   // $fileName = time() . '_' . $file->getClientOriginalName();
   //syntax below is another way to name the image
   $fileName = time() . '_' . $r->prodName.'.'.$r->product_photo->extension();
   $file->move(public_path('images'), $fileName); // Save the file directly under public folder
   $data['product_photo'] = $fileName; // Store the file name in the database
   
  
   Product::create($data);

   return redirect()->back()->with('confirmation','a new product has addedd succefully')->with('color','green');


}

   
}
