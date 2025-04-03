<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class,'index'])->name('products.index');
Route::get('product/create', [ProductController::class,'create'])->name('products.create');
Route::post('product/store', [ProductController::class,'store'])->name('products.store');
Route::get('product/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('product/{id}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('product/{id}/delete', [ProductController::class,'destroy'])->name('products.destroy');
