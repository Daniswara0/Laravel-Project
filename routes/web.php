<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/about', function () {
    return view('admin.about');
})->name('admin.about');

Route::get('/admin/aboutCtrl', [AboutController::class, 'index'])->name('admin.aboutCtrl');

Route::get('/admin/student', function () {
    return view('admin.student');
})->name('admin.student');

Route::get('/admin/studentCtrl', [StudentController::class, 'index'])->name('admin.studentCtrl');

Route::get('/admin/classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');

// Perbaikan di sini (ditambah prefix /admin/ dan nama admin.)
Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects.index');

Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers.index');
