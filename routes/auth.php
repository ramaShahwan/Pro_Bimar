<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\TraineeRegisterController;
use App\Http\Controllers\Auth\UserRegisterController ;
use App\Http\Controllers\Auth\TraineeLoginController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    // Route::get('login', [UserRegisterController::class, 'login'])
    //     ->name('login');

    // Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //     ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //     ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //     ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //     ->name('password.store');



});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


// Route::get('/login/user', [UserRegisterController ::class, 'showLoginForm'])->name('user_login');
Route::post('/login/user', [UserRegisterController ::class, 'login'])->name('user_login_post');
Route::view('/login_user', 'auth.emplogin')->name('login_user');

Route::view('/login_trainee', 'auth.login')->name('login_trainee');
Route::post('/login/trainee', [TraineeRegisterController::class, 'login'])->name('trainee.login.post');

Route::get('/register_trainee', [TraineeRegisterController::class, 'showregisterForm'])->name('trainee_register_get');
Route::post('/store_trainee', [TraineeRegisterController::class, 'register'])->name('trainee_register_post');


Route::post('/logout/user', [UserRegisterController ::class, 'logout'])->name('user_logout');
Route::post('/logout/trainee', [TraineeRegisterController::class, 'logout'])->name('trainee_logout');

// Route::get('/login/user', [UserRegisterController ::class, 'showLoginForm'])->name('user.login');
// Route::post('/login/user', [UserRegisterController ::class, 'login'])->name('user.login.post');

// Route::get('/login/trainee', [TraineeLoginController::class, 'showLoginForm'])->name('trainee.login');
// Route::post('/login/trainee', [TraineeLoginController::class, 'login'])->name('trainee.login.post');

// Route::post('/logout/user', [UserRegisterController ::class, 'logout'])->name('user.logout');
// Route::post('/logout/trainee', [TraineeLoginController::class, 'logout'])->name('trainee.logout');



//for employee
// Route::prefix('user')->group(function () {
//     Route::get('/login', [UserRegisterController ::class, 'showLoginForm'])->name('user.login');
//     Route::post('/login', [UserRegisterController ::class, 'login'])->name('user.login.submit');
//     Route::post('/logout', [UserRegisterController ::class, 'logout'])->name('user.logout');
// });


// for trainee
// Route::prefix('trainee')->group(function () {
//     Route::get('/login', [TraineeLoginController::class, 'showLoginForm'])->name('trainee.login');
//     Route::post('/login', [TraineeLoginController::class, 'login'])->name('trainee.login.submit');
//     Route::post('/logout', [TraineeLoginController::class, 'logout'])->name('trainee.logout');
// });
