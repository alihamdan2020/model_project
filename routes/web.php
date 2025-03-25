<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// subdomain
Route::domain('admin.localhost')->group(function () {
   
    route::get('/create_an_account',function(){
        return view ('admin.register');
    })->name('create');
    
    route::controller(UserController::class)->group(function(){
        route::get('/','login')->name('main');
        route::get('/logout','logout')->name('logout');
        Route::get('/dashboard','dashboard')->name('dashboard');

        route::post('/register','register')->name('register');
        route::post('/checkuser','checkuser')->name('checkuser');
    });

    route::controller(CategoryController::class)->group(function(){
        route::get('/categories','index')->name('showCategories');
        route::post('/category/addCategory','addCategory')->name('add-category');
        route::get('category/destroy/{id}','deleteCategory')->name('deleteCategory');
        
        route::put('/category/update/{id}','updateCategory')->name('updateCategory');
        


    });

    route::controller(ProductController::class)->group(function(){
        route::get('/products','indexAdmin')->name('showProducts');
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
