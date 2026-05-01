<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// public route see without login
Route::get('/', [ProductController::class, 'index']); 
Route::get('/product/{id}', [ProductController::class, 'show']); 

// for authentication page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// logout 
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout']);

// route based on user role(different for seller and buyer)
Route::middleware(['auth'])->group(function () {
    
    // profile page
    Route::get('/profile', [AuthController::class, 'profile']);

    // cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'store']);
    Route::get('/cart/delete/{id}', [CartController::class, 'destroy']);
    Route::post('/checkout', [CartController::class, 'checkout']);

    // only admin visit that
    Route::middleware(['admin'])->group(function () {
        
        // dashboard and user management
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/admin/users', [AdminController::class, 'manageUsers']);
        Route::get('/admin/delete-user/{id}', [AdminController::class, 'deleteUser']);

        // product management
        Route::get('/admin/products', [AdminController::class, 'manageProducts']);
        Route::get('/admin/add-product', [AdminController::class, 'createProduct']);
        Route::post('/admin/store-product', [ProductController::class, 'store']); 
        Route::get('/admin/edit-product/{id}', [AdminController::class, 'editProduct']);
        Route::post('/admin/update-product/{id}', [AdminController::class, 'updateProduct']);
        Route::get('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct']);

        // order management
        Route::get('/admin/orders', [AdminController::class, 'orders']);
        Route::get('/admin/orders/confirm/{id}', [CartController::class, 'confirmOrder']);
    });
});