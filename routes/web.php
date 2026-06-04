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

Route::get('/students/create', function () {
    return view('Admin/student_create');
})->middleware('user.auth')->name('student.create');

Route::post('/student/store', [AdminController::class, 'student_store'])
    ->middleware('user.auth')
    ->name('student.store');

Route::get('/student/list', [AdminController::class, 'student_list'])
    ->middleware('user.auth')
    ->name('admin.students.list');

Route::get('/students/export/csv', [AdminController::class, 'exportCsv'])
    ->middleware('user.auth')
    ->name('students.export.csv');

Route::post('/students/{id}/toggle-status', [AdminController::class, 'toggleStatus'])
    ->middleware('user.auth')
    ->name('students.toggle-status');

Route::get('/students/{id}', [AdminController::class, 'student_show'])
    ->middleware('user.auth')
    ->name('students.show');

Route::get('/students/edit/{id}', [AdminController::class, 'student_edit'])
    ->name('students.edit');

Route::post('/students/update/{id}', [AdminController::class, 'student_update'])
    ->name('students.update');
Route::delete('/students/delete/{id}', [AdminController::class, 'student_delete'])
    ->name('students.delete');


Route::get('/teachers/{id}', [AdminController::class, 'teacher_show'])
    ->middleware('user.auth')
    ->name('teachers.show');

Route::get('/admin/teachers', [AdminController::class, 'teacher_list'])
    ->middleware('user.auth')
    ->name('admin.teachers.list');

Route::get('/admin/teacher/create', [AdminController::class, 'teacher_create'])
    ->middleware('user.auth')
    ->name('teacher.create');

Route::post('/admin/teacher/store', [AdminController::class, 'teacher_store'])
    ->middleware('user.auth')
    ->name('teacher.store');

Route::get('/teachers/edit/{id}', [AdminController::class, 'teacher_edit'])
    ->middleware('user.auth')
    ->name('teachers.edit');

Route::post('/teachers/update/{id}', [AdminController::class, 'teacher_update'])
    ->middleware('user.auth')
    ->name('teachers.update');

Route::delete('/teachers/delete/{id}', [AdminController::class, 'teacher_delete'])
    ->middleware('user.auth')
    ->name('teachers.delete');