<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ShoeController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ProductBlogController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Authentication Routes
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes
Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('admin.dashboard');

    Route::get('/companies', [CompanyController::class, 'index'])->name('admin.companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('admin.companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('admin.companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('admin.companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('admin.companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('admin.companies.destroy');

    // Shoe Routes
    Route::get('/shoes', [ShoeController::class, 'index'])->name('admin.shoes.index');
    Route::get('/shoes/create', [ShoeController::class, 'create'])->name('admin.shoes.create');
    Route::post('/shoes', [ShoeController::class, 'store'])->name('admin.shoes.store');
    Route::get('/shoes/{shoe}', [ShoeController::class, 'show'])->name('admin.shoes.show');
    Route::get('/shoes/{shoe}/edit', [ShoeController::class, 'edit'])->name('admin.shoes.edit');
    Route::put('/shoes/{shoe}', [ShoeController::class, 'update'])->name('admin.shoes.update');
    Route::delete('/shoes/{shoe}', [ShoeController::class, 'destroy'])->name('admin.shoes.destroy');

    // Attribute Routes
    Route::get('/attributes', [AttributeController::class, 'index'])->name('admin.attributes.index');
    Route::get('/attributes/create', [AttributeController::class, 'create'])->name('admin.attributes.create');
    Route::post('/attributes', [AttributeController::class, 'store'])->name('admin.attributes.store');
    Route::get('/attributes/{attribute}', [AttributeController::class, 'show'])->name('admin.attributes.show');
    Route::get('/attributes/{attribute}/edit', [AttributeController::class, 'edit'])->name('admin.attributes.edit');
    Route::put('/attributes/{attribute}', [AttributeController::class, 'update'])->name('admin.attributes.update');
    Route::delete('/attributes/{attribute}', [AttributeController::class, 'destroy'])->name('admin.attributes.destroy');

    // Product Blog Routes
    Route::get('/product-blogs', [ProductBlogController::class, 'index'])->name('admin.product-blogs.index');
    Route::get('/product-blogs/create', [ProductBlogController::class, 'create'])->name('admin.product-blogs.create');
    Route::post('/product-blogs', [ProductBlogController::class, 'store'])->name('admin.product-blogs.store');
    Route::get('/product-blogs/{product_blog}', [ProductBlogController::class, 'show'])->name('admin.product-blogs.show');
    Route::get('/product-blogs/{product_blog}/edit', [ProductBlogController::class, 'edit'])->name('admin.product-blogs.edit');
    Route::put('/product-blogs/{product_blog}', [ProductBlogController::class, 'update'])->name('admin.product-blogs.update');
    Route::delete('/product-blogs/{product_blog}', [ProductBlogController::class, 'destroy'])->name('admin.product-blogs.destroy');
});
