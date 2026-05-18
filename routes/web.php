<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;

Route::get('/' , function(){
    return view('welcome');
});


Route::get('/login', [UserAuthController::class, 'showLogin']);
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
// Protected route
Route::get('/dashboard', function () {
    return view('Admin/dashboard');
})->middleware('user.auth');

Route::get('/student/create', function () {
    return view('Admin/student_create');
})->middleware('user.auth')->name('student.create');

Route::post('/student/store', [AdminController::class, 'student_store'])
    ->middleware('user.auth')
    ->name('student.store');