<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/',[ProductController::class,'products'])->name('products.view');
// Route::get('/create',[ProductController::class,'create'])->name('create.view');
Route::post('/store',[ProductController::class,'store'])->name('product.store');
Route::post('/update',[ProductController::class,'update'])->name('product.update');
Route::post('/delete',[ProductController::class,'delete'])->name('product.delete');
Route::get('/pagination/pagination-data',[ProductController::class,'pagination']);
Route::get('/search',[ProductController::class,'search'])->name('search.product');
