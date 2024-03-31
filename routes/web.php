<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blog', [HomeController::class, 'blog']);
    Route::get('/artikel', [HomeController::class, 'artikel']);
    Route::get('/produk', [HomeController::class, 'produk'])->name('produk');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/profile', [HomeController::class, 'user'])->name('profile');
    Route::get('/profile-create', [HomeController::class, 'create'])->name('profile.create');
    Route::post('/create-profile', [HomeController::class, 'store'])->name('store-profile');
    Route::get('/profile-edit', [HomeController::class, 'user_setting'])->name('edit-profile');
    Route::put('/profile-edit', [HomeController::class, 'update'])->name('update-profile');

    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/tambahProduk', [ProdukController::class, 'tambahProduk'])->name('product-create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

    Route::get('/forgot', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth', 'check.admin.role'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit.user');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
    Route::get('/admin/report/{id}', [AdminController::class, 'reportUser'])->name('report.user');
});
