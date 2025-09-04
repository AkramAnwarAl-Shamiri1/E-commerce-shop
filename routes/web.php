<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;


Route::get('/', [StoreController::class, 'home'])->name('home');
Route::get('/products', [StoreController::class, 'products'])->name('products');
Route::get('/product-details', [StoreController::class, 'productDetails'])->name('product-details');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
Route::get('/about-us', [StoreController::class, 'aboutUs'])->name('about-us');

Route::get('/contact', [StoreController::class, 'contact'])->name('contact');
Route::post('/contact', [StoreController::class, 'send'])->name('contact.send');
