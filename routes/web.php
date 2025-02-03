<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

route::get('/', [HomeController::class, 'home']);

route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders', [HomeController::class, 'my_orders'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

route::get('update_product/{slug}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth', 'admin']);

route::get('add_promotion', [AdminController::class, 'add_promotion'])->middleware(['auth', 'admin']);

route::post('upload_promotion', [AdminController::class, 'upload_promotion'])->middleware(['auth', 'admin']);

route::get('product_details/{id}', [HomeController::class, 'product_details']);

route::post('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

route::post('add_contact', [HomeController::class, 'add_contact']);

route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);

route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

route::get('shop', [HomeController::class, 'shop']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});

route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);

route::get('shipped/{id}', [AdminController::class, 'shipped'])->middleware(['auth', 'admin']);

route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);

//route::get('/checkout', [HomeController::class, 'checkout']);
//route::post('/checkout', [HomeController::class, 'afterPayment'])->name('stripe');