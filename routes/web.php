<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// subdomain
Route::domain('admin.localhost')->group(function () {
   
    route::get('/create_an_account',function(){
        return view ('admin.register');
    })->name('create');
    
    route::controller(UserController::class)->group(function(){
        route::get('/','login');
        route::post('/register','register')->name('register');
        route::post('/checkuser','checkuser')->name('checkuser');
    });

});


Route::get('/aboutus', function () {
    return view('aboutus');
})->name('about');

route::controller(ProductController::class)->group(function () {
    route::get('/', 'index')->name('home');
    //i set productId as parameter to indicate that it is not obligatry name the parameter here as the paramerter in show function
    route::get('/show/{productID}', 'show');
});
