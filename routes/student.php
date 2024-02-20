<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalizationController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// //==============================Translate all pages============================
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
//     ], function () {

// //==============================Translate all pages============================

// Route::get("locale/{lange}", [LocalizationController::class, 'setLang'])->name('lang');


//     //==============================dashboard============================
//     Route::get('/student/dashboard', function () {
//         return view('pages.students.dashboard');
//     })->name('dashboard.Students');

//     // Route::group(['namespace' => 'Students\dashboard'], function () {
//     //     Route::resource('student_exams', App\Http\Controllers\ExamsController::class);
//     //     Route::resource('profile-student', App\Http\Controllers\ProfileController::class);

//     // });

// });

//==============================Translate all pages============================

Route::get("locale/{lange}", [LocalizationController::class, 'setLang'])->name('lang');


    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.students.dashboard');
    })->name('dashboard.Students');