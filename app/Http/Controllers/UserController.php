<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function login(){
    return view('admin.index');
   }

   public function register(Request $req){
      // dd($req->toArray());
      $req->validate([
         'name'=>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:5'
      ]);
      if($req->input('role')==='on')
         $role=1; //mean superuser can delete products
      else
      $role=2; //normal user has only to create products

      $data=$req->only('email','password','name');
      $data["role"]=$role;
      // dd($data);
      User::create($data);
      return redirect()->back()->with('msg','new user was added succefully');
   }

   public function checkuser(Request $req){
      $req->validate([
         'email'=>'required|email',
         'password'=>'required|min:5'
      ]);
      $data=$req->only('email','password');
      if(auth()->attempt($data)){
         return view('admin.dashboard');
     }
     else
     return redirect()->back()->with('msg','error usernamee or password');
   }
}
