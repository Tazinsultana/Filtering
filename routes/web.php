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

// For Product.....
Route::get('/product',[ProductController::class,'Index'])->name('product.index');
