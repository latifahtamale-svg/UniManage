<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LecturerCourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPortalController;
use Illuminate\Support\Facades\Route;

/*
| Authentication (resources/views/index.blade.php is the login page)
*/
Route::middleware('guest')->group(function () {
    Route::get('/', fn () => view('index'))->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {

    /*
    | Administrator: URLs start with /admin, route names stay plain (students.index ...)
    */
    Route::prefix('admin')->group(function () {
        Route::resource('students', StudentController::class)
            ->except('show')->middleware('permission:manage students');

        Route::resource('courses', CourseController::class)
            ->except('show')->middleware('permission:manage courses');

        Route::resource('lecturers', LecturerController::class)
            ->except('show')->middleware('permission:manage lecturers');

        Route::resource('registrations', RegistrationController::class)
            ->except(['show', 'create'])->middleware('permission:manage registrations');
    });

    /*
    | Lecturer
    */
    Route::get('/lecturer/courses', [LecturerCourseController::class, 'index'])
        ->name('lecturer.courses')->middleware('permission:view assigned courses');

    /*
    | Student
    */
    Route::get('/student/courses', [StudentPortalController::class, 'courses'])
        ->name('student.courses')->middleware('permission:view available courses');
    Route::post('/student/courses/{course}/register', [StudentPortalController::class, 'register'])
        ->name('student.register')->middleware('permission:view available courses');
    Route::get('/student/registrations', [StudentPortalController::class, 'registrations'])
        ->name('student.registrations')->middleware('permission:view own registrations');
});
