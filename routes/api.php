<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest.api')->group(function() {
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
});

Route::middleware('auth.api')->group(function() {
    // For Login Customer
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    // Add To Cart
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::get('/cart/show', [ShoppingCartController::class, 'show'])->name('cart.show');
    Route::post('/cart/product/{id}', [ShoppingCartController::class, 'create'])->where(['id' => '[0-9]+'])->name('cart.create');

    // Order
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'show'])->name('order.show');

    // For Super Admin
    Route::group(['prefix' => 'superadmin', 'middleware' => ['super_admin']], function() {
        // Manage Customer
        Route::get('/customer', [CustomerController::class, 'index'])->name('superadmin.customer.index');
        Route::delete('/customer', [CustomerController::class, 'destroy'])->name('superadmin.customer.destroy');

        // Manage Category
        Route::get('/category', [CategoryController::class, 'index'])->name('superadmin.category.index');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->where(['id' => '[0-9]+'])->name('superadmin.category.show');
        Route::post('/category', [CategoryController::class, 'create'])->name('superadmin.category.create');
        Route::match(['put', 'patch'], '/category', [CategoryController::class, 'update'])->name('superadmin.category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('superadmin.category.destroy');
    });

    // For Super Admin and Product Manager
    Route::group(['prefix' => 'productmanager', 'middleware' => ['product_manager']], function() {
        // Manage Product
        Route::get('/product', [App\Http\Controllers\AdminController\ProductController::class, 'index'])->name('productmanager.product.index');
        Route::get('/product/{id}', [App\Http\Controllers\AdminController\ProductController::class, 'show'])->where(['id' => '[0-9]+'])->name('superadmin.product.show');
        Route::post('/product', [App\Http\Controllers\AdminController\ProductController::class, 'create'])->name('productmanager.product.create');
        Route::match(['put', 'patch'], '/product/{id}', [App\Http\Controllers\AdminController\ProductController::class, 'update'])->where(['id' => '[0-9]+'])->name('productmanager.product.update');
        Route::delete('/product/{id}', [App\Http\Controllers\AdminController\ProductController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('productmanager.product.destroy');
    });
});

// For all
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{id}', [HomeController::class, 'show'])->where(['id' => '[0-9]+'])->name('product.show');
Route::get('/category/{id}/products', [HomeController::class, 'productsWithCategory'])->where(['id' => '[0-9]+'])->name('product.productsWithCategory');
