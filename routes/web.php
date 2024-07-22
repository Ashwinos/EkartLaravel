<?php

use App\Http\Controllers\Home\AdminController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\Home\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/', [HomepageController::class, 'home']);
 Route::get('/admin/login', [AdminController::class, 'login']);
 Route::post('/admin/do-login', [AdminController::class, 'doLogin'])->name('dologin');
 Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
 Route::get('/admin/products', [ProductController::class, 'products'])->name('products');
 Route::post('/admin/product/create', [ProductController::class, 'create'])->name('createproduct');
 
 