<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminCon;
use App\Http\Controllers\admin\categoryCon;
use App\Http\Controllers\admin\courseCon;

Auth::routes();

Route::get('/',function(){
    return view('font_end.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->group(function(){
    Route::get('/login',[adminCon::class,'showLoginPage'])->middleware(['adminAuthCheck']);//laravel auth package
    Route::post('logout',[adminCon::class,'logout'])->name('admin-logout');
    //register route
    // Route::get('/register',[adminCon::class,'showRegisterPage'])->name('registerPage');//laravel auth package
    Route::get('/dashboard',[adminCon::class,'showAdminPage'])->middleware(['adminAuth']);
    //create profile route
    Route::get('/profile',[adminCon::class,'showCreateProfilePage'])->name('adminProfile');
    Route::post('/saveProfile',[adminCon::class,'saveProfile'])->name('saveProfile');
    //edit progile route
    Route::get('/profile/edit',[adminCon::class,'showEditProfilePage'])->name('adminProfileEdit');
    Route::post('/saveEditProfile',[adminCon::class,'saveEditProfile'])->name('saveEditProfile');
    //edit user email and pass
    Route::post('/adminUserUpdate',[adminCon::class,'adminUserUpdate'])->name('adminUserUpdate');
    Route::get('/adminPassUpdate',[adminCon::class,'adminPassUpdate']);//route name nai karon ata jquery diye append kora link
    Route::post('/adminPassUpdate/save',[adminCon::class,'saveUpdatePassword'])->name('saveUpdatePassword');
    //add admin
    Route::get('/addAdmin',[adminCon::class,'showAddAdminPage'])->name('addAdmin');
    Route::post('/saveAddAdmin',[adminCon::class,'saveAddAdmin'])->name('saveAddAdmin');
    //course category
    Route::get('/categories',[categoryCon::class,'showCategoryPage'])->name('categories');
    Route::get('/addCategory',[categoryCon::class,'showAddCategoryPage'])->name('addCategory');
    Route::post('/saveCategory',[categoryCon::class,'saveCategory'])->name('saveCategory');
    //course
    Route::get('/course',[courseCon::class,'showCoursePage'])->name('course');
    Route::get('/addCourse',[courseCon::class,'showAddCoursePage'])->name('addCourse');
    Route::post('/saveCourse',[courseCon::class,'saveCourse'])->name('saveCourse');
});

