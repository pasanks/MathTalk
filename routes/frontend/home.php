<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Operation\OperationController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/loginView', [HomeController::class, 'loginView'])->name('loginView');
Route::get('/registerView', [HomeController::class, 'registerView'])->name('registerView');
Route::get('/testDP', [HomeController::class, 'testDP'])->name('testDP');
Route::get('/courseDetails/{id}', [HomeController::class, 'courseDetails'])->name('courseDetails');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Operation', 'as' => 'operation.'], function () {
        // User Dashboard Specific
        Route::get('enroll_course/{id}', [OperationController::class, 'enroll_course'])->name('enroll_course');
        Route::get('processPaymentDetails', [OperationController::class, 'processPaymentDetails'])->name('processPaymentDetails');
        Route::post('PaymentPage', [OperationController::class, 'PaymentPage'])->name('PaymentPage');
        Route::post('handlePaymentResponse', [OperationController::class, 'handlePaymentResponse'])->name('handlePaymentResponse');


    });
});
