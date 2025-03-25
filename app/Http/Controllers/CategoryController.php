<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index()
    {
        $user = Auth::user();
        // $categories = Category::limit(5)->get();
        // $categories = Category::all()->latest();
        $categories = Category::orderBy('category_id','desc')->get();
        $msg = "categories";
        return view('admin.dashboard', compact('categories', 'msg', 'user'));
    }

    public function addCategory(Request $r)
    {
        $r->validate(
            [
                'catName' => 'required'
            ],
            [
                'required' => 'This filed is obligatory'
            ]
        );
        $data['category_name']=$r->input('catName');
        Category::create($data);
        return redirect()->back()->with('confirmation','The category has beed added succefully')->with('color','green');
    }

    function deleteCategory ($id){
        $cat=Category::findorfail($id);
       $cat->delete();
       return redirect()->back()->with('confirmation','The category has beed deleted with all products related')->with('color','red');
    }

    function updateCategory($id,Request $req){
        $req->validate([
            "category_name"=>'required'
        ]);

        $cat=Category::find($id);
        $cat['category_name']=$req->input('category_name');
        $cat->update();
        // $cat->update([
        //     'category_name'=>$req->input('category_name')
        // ]); other method
        return redirect()->back()->with('confirmation','category name has updaed succefully')->with('color','green');
    }
}
