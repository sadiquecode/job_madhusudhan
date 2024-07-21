<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\GlobalDetails\SresultController;



Route::get('/', [DashboardController::class, 'index'])->name('index');


// accounts
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login-admin');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
// Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');


// Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
// Route::post('/forgotpassword-email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotpassword.email');
// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('showResetForm');
// Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');



Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard/customers', [RegisterController::class, 'all_customer'])->name('all_customer');
    Route::post('/insert_customer', [RegisterController::class, 'insert_customer'])->name('insert_customer');


    Route::get('/edit-profile/{uid}', [RegisterController::class, 'edit_profile'])->name('edit_profile.aiuser');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/change/theme/{theme}', [DashboardController::class, 'change_theme'])->name('change_theme');
    Route::get('/change/lang/{lang}', [DashboardController::class, 'change_lang'])->name('change_lang');

    Route::get('/profile/{uid}', [RegisterController::class, 'my_profile'])->name('my_profile');

    Route::get('/del/{type}/{data_id}', [RegisterController::class, 'del_data'])->name('del_data');
    
    Route::get('/get-sub-locations/{location_id}', [RegisterController::class, 'getSubLocations'])->name('getSubLocations');

    Route::get('/tutor-status/{type}/{status}/{user_id}', [RegisterController::class, 'tutor_status'])->name('tutor_status');
    
    Route::post('/reject_profile', [RegisterController::class, 'reject_profile'])->name('reject_profile');

    Route::get('/check_mail', [RegisterController::class, 'check_mail'])->name('check_mail');


// result
    Route::get('dashboard/result', [SresultController::class, 'index'])->name('result.index');
    Route::post('result', [SresultController::class, 'store'])->name('result.store');
    Route::put('result/{result}', [SresultController::class, 'update'])->name('result.update');
    Route::delete('result/{result}', [SresultController::class, 'destroy'])->name('result.destroy');
    Route::post('/delete-bulk-records', [SresultController::class, 'deleteBulkRecords'])->name('delete.bulk.records');
    Route::post('dashboard/send_msg', [SresultController::class, 'sendBulkMessages'])->name('send.bulk.messages');


});

