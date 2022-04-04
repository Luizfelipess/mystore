<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.product.store');

Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('admin.product.update');

Route::get('/admin/products/{product}/delete', [AdminController::class, 'destroy'])->name('admin.product.destroy');

Route::get('/admin/products/{product}/delete-image', [AdminController::class, 'destroyImage'])->name('admin.product.destroyImage');
