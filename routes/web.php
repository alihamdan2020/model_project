<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// subdomain
Route::domain('subdomain.localhost')->group(function () {
    
    route::controller(UserController::class)->group(function(){
        route::get('/','login');
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
