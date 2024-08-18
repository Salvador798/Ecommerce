<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\OrderController as HomeOrderController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\StripeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dasboard', [HomeController::class, 'home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

/* Category */
Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/category/create', [CategoryController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('/category/store', [CategoryController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'admin']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'admin']);

/* Product */
Route::get('/product/create', [ProductController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('/product/create', [ProductController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('/product', [ProductController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->middleware(['auth', 'admin']);
Route::get('/product/edit/{slug}', [ProductController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('search', [ProductController::class, 'search'])->middleware(['auth', 'admin']);
Route::get('/details/{id}', [HomeProductController::class, 'details']);

/* Cart */
Route::get('/cart/create/{id}', [CartController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->middleware(['auth', 'verified']);

/* Order */
Route::post('/order/create', [HomeOrderController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/order/list', [OrderController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware('auth', 'admin');
Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware('auth', 'admin');
Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware('auth', 'admin');
Route::get('/order', [HomeOrderController::class, 'index'])->middleware(['auth', 'verified']);

/* Access */
Route::get('shop', [HomeController::class, 'shop']);
Route::get('why_us', [HomeController::class, 'why']);
Route::get('testimonial', [HomeController::class, 'testimonial']);
Route::get('contact', [HomeController::class, 'contact']);

/* Stripe */
Route::controller(StripeController::class)->group(function () {
    Route::get('stripe/{value}', 'index');
    Route::post('stripe/{value}', 'store')->name('stripe.post');
});
