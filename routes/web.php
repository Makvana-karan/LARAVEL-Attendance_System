<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('layout.main');
});


Route::view('login','Auth.login')->name('Auth.login');

Route::post('/register',[AuthController::class,'register'])->name('register.post');
Route::post('/login',[AuthController::class,'login'])->name('login.post');


Route::get('/student',[HomeController::class,'Student']);
Route::get('/attendance',[HomeController::class,'Attendance']);
Route::get('/show',[HomeController::class,'Show']);

Route::get('/show_add',[StudentController::class,'show_add']);
Route::post('/add',[StudentController::class,'student_add'])->name('student_add');

Route::get('edit/{id}',[StudentController::class,'showdata']);
Route::put('edit',[StudentController::class,'student_edit'])->name('student_edit');
Route::get('delete/{id}',[StudentController::class,'student_delete']);

Route::get('/show', [AttendanceController::class, 'index']);
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');









