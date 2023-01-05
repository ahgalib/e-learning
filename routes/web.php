<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminCon;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->group(function(){
    Route::get('/login',[adminCon::class,'showLoginPage'])->middleware(['adminAuthCheck']);//laravel auth package
    Route::post('logout',[adminCon::class,'logout'])->name('admin-logout');

    Route::get('/dashboard',[adminCon::class,'showAdminPage'])->middleware(['adminAuth']);
    Route::get('/profile',[adminCon::class,'showCreateProfilePage'])->name('adminProfile');
    Route::get('/profile',[adminCon::class,'showCreateProfilePage'])->name('adminProfile');
    Route::post('/saveProfile',[adminCon::class,'saveProfile'])->name('saveProfile');


});

