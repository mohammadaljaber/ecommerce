<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashbordcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\front\frontcontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[frontcontroller::class,'index'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashbord',[dashbordcontroller::class,'index']);

    //// categorys ////

    Route::get('category',[CategoryController::class,'index']);
    Route::get('category/create',[CategoryController::class,'create']);
    Route::post('category',[CategoryController::class,'store']);
    Route::get('category/{category}/edit',[CategoryController::class,'edit']);
    Route::put('category/{category}',[CategoryController::class,'update']);

    Route::controller(ProductController::class)->group(function(){
        Route::get('products','index');
        Route::get('products/create','create');
        Route::post('products','store');
        Route::get('products/{id}/edit','edit');
        Route::put('products/{id}','update');
        Route::get('products/{id}/delete','delete');
        Route::post('product-color/{pro_color_id}','updateproductcolor')->name('update.pro.color');
        Route::get('porduct-color/{pro_color_id}/dalete','deleteprodcolor');
    });

    Route::get('brands',App\Livewire\Admin\Brands\Index::class);

    Route::controller(ColorController::class)->group(function(){
        Route::get('colors','index');
        Route::get('colors/create','create');
        Route::post('colors/create','store');
        Route::get('colors/delete/{id}','delete');
        Route::get('colors/edit/{id}','edit');
        Route::put('colors/{id}','update');
    });
    Route::controller(SliderController::class)->group(function(){
        Route::get('sliders','index');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/edit/{id}','edit');
        Route::put('sliders/update/{slider}','update');
        Route::get('sliders/delete/{slider}','delete');


    });

});

