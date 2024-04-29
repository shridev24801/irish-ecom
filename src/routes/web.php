<?php

use Illuminate\Support\Facades\Artisan;
use Irish\Ecom\Controllers\EcomContoller;
use Illuminate\Support\Facades\Route;
use Irish\Ecom\Controllers\ProductController;
use Laravel\Fortify\Fortify;
use Spatie\Permission\Middleware\RoleMiddleware;


Route::get('shri', [EcomContoller::class,'firstOne']);
Route::get('post/create', [ProductController::class,'create'])->name('post/create');
Route::post('post-store', [ProductController::class,'store'])->name('post-store');
// Route::get('/', [ProductController::class,'index']);

Route::get('post/edit/{id}', [ProductController::class, 'edit'])->name('post.edit');
Route::post('post/update', [ProductController::class, 'update'])->name('post/update');



Route::middleware(['web', 'auth', 'role:admin'])->group(function () {
    Route::get('/admin/posts', [ProductController::class, 'index']);
});

Route::get('/', function () {
    return view('ecom::landing');
});
// Routes accessible only to users
// Route::middleware(['web', 'auth', 'role:user'])->group(function () {
 
// });
Route::get('cache',function(){

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    
    return 'cache cleared successfully';

});
Route::middleware('web')->group(function () {
    // Login and registration routes
    Fortify::loginView('auth::login');
    Fortify::registerView('auth::register');
});
