<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserAuthController::class, 'showLogin']);
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
// Protected route
Route::get('/dashboard', function () {
    return view('Admin/dashboard');
})->middleware('user.auth')->name('admin.dashboard');

Route::get('/student/create', function () {
    return view('Admin/student_create');
})->middleware('user.auth')->name('student.create');

Route::post('/student/store', [AdminController::class, 'student_store'])
    ->middleware('user.auth')
    ->name('student.store');

Route::get('/admin/students', [AdminController::class, 'student_list'])
    ->middleware('user.auth')
    ->name('admin.students.list');

Route::get('/students/export-csv', [AdminController::class, 'exportCsv'])
    ->middleware('user.auth')
    ->name('students.export.csv');

Route::post('/students/{id}/toggle-status', [AdminController::class, 'toggleStatus'])
    ->middleware('user.auth')
    ->name('students.toggle-status');

    Route::get('/students/{id}', [AdminController::class, 'show'])
      ->middleware('user.auth')
    ->name('students.show');



Route::get('/admin/teachers', [AdminController::class, 'teacher_list'])
    ->middleware('user.auth')
    ->name('admin.teachers.list');

Route::get('/admin/teacher/create', [AdminController::class, 'teacher_create'])
    ->middleware('user.auth')
    ->name('teacher.create');

Route::post('/admin/teacher/store', [AdminController::class, 'teacher_store'])
    ->middleware('user.auth')
    ->name('teacher.store');