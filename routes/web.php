<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyTeacherModuleAccess;

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
    return redirect('/dashboard');
});

Route::middleware([
    'checkIfAccountIsActive',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        '/dashboard',
        [App\Http\Controllers\DashboardHomeController::class, 'index']
    )->name('dashboard');


    // Admin Only routes
    Route::middleware('validateRole:admin')->group(function () {

        Route::get('/admin', function () {
            // say hello world to admin
            return 'Hello admin';
        })->name('admin');

        Route::get('/manage/users', [App\Http\Controllers\UserController::class, 'index'])->name('manage-users');

        // Adding user
        Route::get('/manage/users/add-student', [App\Http\Controllers\UserController::class, 'showAddStudentForm'])->name('add-student');
        Route::get('/manage/users/add-teacher', [App\Http\Controllers\UserController::class, 'showAddTeacherForm'])->name('add-teacher');
        Route::post('/manage/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');

        // Viewing user to manage
        Route::get('/manage/users/{user_id}', [App\Http\Controllers\UserController::class, 'view'])->name('view-user');

        // Editing user
        Route::get('/manage/users/{user_id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
        Route::put('/manage/users/{user_id}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');

        // Activate user
        Route::put('/manage/users/{user_id}/activate', [App\Http\Controllers\UserController::class, 'activate'])->name('activate-user');
        Route::put('/manage/users/{user_id}/deactivate', [App\Http\Controllers\UserController::class, 'deactivate'])->name('deactivate-user');

        // Delete user
        Route::delete('/manage/users/{user_id}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');

        // View Grades in Manage
        Route::get('/grade/index', function () {
            return view('grade.index');
        })->name('grade');

        // Show classes of a grade
        Route::get('/grade/class/{gradeId}', function ($gradeId) {
            return view('grade.class', compact('gradeId'));
        })->name('class');


        // //show modules of a class
        // Route::get('/grade/class/{gradeId}/module/{moduleId}', function ($gradeId, $moduleId) {
        //     return view('grade.module', compact('gradeId', 'moduleId'));
        // })->name('module');

        // View Class in Manage
        Route::get('/class/{class_id}', function ($class_id) {
            return view('grade.view-class', compact('class_id'));
        })->name('view-class');

        // Add students to the class
        Route::get('/class/{class_id}/add-students', function ($class_id) {
            return view('grade.classes.add-students-to-class', compact('class_id'));
        })->name('add-students-to-class');
    });

    // Teacher Only routes
    Route::middleware('validateRole:teacher')->group(function () {

        // Route::get('/teacher', function () {
        //     // say hello world to teacher
        //     return 'Hello teacher';
        // })->name('teacher');

        Route::get('/teacher/modules', function () {
            return view('teacher.modules');
        })->name('teacher-modules');

        // routes/web.php

        Route::get('/teacher/module-details/{module_id}', function ($module_id) {
            return view('teacher.module-details',compact('module_id'));
        })->name('module-details');

        Route::get('/teacher/show-submission/{assignment_id}', function ($assignment_id) {
            return view('teacher.show-submission',compact('assignment_id'));
        })->name('show-submission');

       


    });


    // Admin and Teacher only routes
    Route::middleware('validateRole:admin,teacher')->group(function () {
    });

    Route::get('teacher/{module_id}/assignment', function ($module_id) {
        return view('teacher.assignment', compact('module_id'));
    })->name('assignments');

    // Student Only routes
    Route::middleware('validateRole:student')->group(function () {

        Route::get('/student', function () {
            // say hello world to student
            return 'Hello student';
        })->name('student');
    });

    Route::get('/student/my-modules', function () {
        return view('student.my-modules');
    })->name('student-modules');

    Route::get('/student/my-module-details/{module_id}', function ($module_id) {
        return view('student.my-module-details', compact('module_id'));
    })->name('student-module-details');


    Route::get('/student/assignment-submittion/{assignment_id}', function ($assignment_id) {
        return view('student.assignment-submittion', compact('assignment_id'));
    })->name('assignment-submission');
});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('grade/index', function () {
//    return view('grade.index');
//})->name('grade');
//

//Route::middleware(['auth:sanctum', 'verified'])->get('grade/class/{gradeId}', function ($gradeId) {
//    return view('grade.class', compact('gradeId'));
//})->name('class');

