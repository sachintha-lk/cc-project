<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // TODO if admin return admin view, if student return student view, if teacher return teacher view

        return view('dashboard');
    })->name('dashboard');


    // Admin Only routes
    Route::middleware('validateRole:admin')->group(function () {

        Route::get('/admin', function () {
            // say hello world to admin
            return 'Hello admin';
        })->name('admin');
    });

    // Teacher Only routes
    Route::middleware('validateRole:teacher')->group(function () {

        Route::get('/teacher', function () {
            // say hello world to teacher
            return 'Hello teacher';
        })->name('teacher');
    });

    // Student Only routes
    Route::middleware('validateRole:student')->group(function () {

        Route::get('/student', function () {
            // say hello world to student
            return 'Hello student';
        })->name('student');
    });
});
