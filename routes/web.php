<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\GlobalDetails\SpecialityController;
use App\Http\Controllers\GlobalDetails\ExpertiseController;
use App\Http\Controllers\GlobalDetails\TeachMeSubjectController;
use App\Http\Controllers\GlobalDetails\AcademicController;
use App\Http\Controllers\GlobalDetails\Non_AcademicController;



Route::get('/', [DashboardController::class, 'index'])->name('index');


// accounts
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login-admin');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
// Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');


// Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
// Route::post('/forgotpassword-email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotpassword.email');
// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('showResetForm');
// Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::post('submit_application', [DashboardController::class, 'submit_application'])->name('submit_application');

Route::get('/thank-you', [DashboardController::class, 'thank_you'])->name('thank-you');
Route::get('/filter-page', [DashboardController::class, 'filter_page'])->name('filter_page');
Route::get('/application-details/{app_id}', [DashboardController::class, 'application_details'])->name('application_details');

Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard/customers', [RegisterController::class, 'all_customer'])->name('all_customer');
    Route::post('/insert_customer', [RegisterController::class, 'insert_customer'])->name('insert_customer');


    Route::get('/edit-profile/{uid}', [RegisterController::class, 'edit_profile'])->name('edit_profile.aiuser');
    Route::put('/dashboard/profile/{user}', [RegisterController::class, 'update_profile'])->name('update_profile.update');
    
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


    // subject
    Route::get('dashboard/subject', [TeachMeSubjectController::class, 'index'])->name('subject.index');
    Route::post('subject', [TeachMeSubjectController::class, 'store'])->name('subject.store');
    Route::put('subject/{subject}', [TeachMeSubjectController::class, 'update'])->name('subject.update');
    Route::delete('subject/{subject}', [TeachMeSubjectController::class, 'destroy'])->name('subject.destroy');

    // speciality
    Route::get('dashboard/speciality', [SpecialityController::class, 'index'])->name('speciality.index');
    Route::post('speciality', [SpecialityController::class, 'store'])->name('speciality.store');
    Route::put('speciality/{speciality}', [SpecialityController::class, 'update'])->name('speciality.update');
    Route::delete('speciality/{speciality}', [SpecialityController::class, 'destroy'])->name('speciality.destroy');

    // expertise
    Route::get('dashboard/expertise', [ExpertiseController::class, 'index'])->name('expertise.index');
    Route::post('expertise', [ExpertiseController::class, 'store'])->name('expertise.store');
    Route::put('expertise/{expertise}', [ExpertiseController::class, 'update'])->name('expertise.update');
    Route::delete('expertise/{expertise}', [ExpertiseController::class, 'destroy'])->name('expertise.destroy');

    // academic
    Route::get('dashboard/academic', [AcademicController::class, 'index'])->name('academic.index');
    Route::post('academic', [AcademicController::class, 'store'])->name('academic.store');
    Route::put('academic/{academic}', [AcademicController::class, 'update'])->name('academic.update');
    Route::delete('academic/{academic}', [AcademicController::class, 'destroy'])->name('academic.destroy');

    // non academic
    Route::get('dashboard/non_academic', [Non_AcademicController::class, 'index'])->name('non_academic.index');
    Route::post('non_academic', [Non_AcademicController::class, 'store'])->name('non_academic.store');
    Route::put('non_academic/{non_academic}', [Non_AcademicController::class, 'update'])->name('non_academic.update');
    Route::delete('non_academic/{non_academic}', [Non_AcademicController::class, 'destroy'])->name('non_academic.destroy');

});

