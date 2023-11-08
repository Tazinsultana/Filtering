<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// For Category......
Route::get('/category',[CategoryController::class,'Index'])->name('category.index');
Route::post('/insert',[CategoryController::class,'Create'])->name('category.insert');
Route::delete('/delete',[CategoryController::class,'Delete'])->name('category.delete');
Route::get('/edit',[CategoryController::class,'Edit'])->name('category.edit');
Route::put('/update',[CategoryController::class,'Update'])->name('category.update');

// For Product.....
Route::get('/product',[ProductController::class,'Index'])->name('product.index');
Route::post('/product-create',[ProductController::class,'Create'])->name('product.create');
Route::delete('/product-delete',[ProductController::class,'Delete'])->name('product.delete');
Route::get('/product-edit',[ProductController::class,'Edit'])->name('product.edit');
Route::put('/product-update',[ProductController::class,'Update'])->name('product.update');
