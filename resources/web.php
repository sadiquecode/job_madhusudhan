<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TutorController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\GlobalDetails\TeachMeSubjectController;
use App\Http\Controllers\GlobalDetails\TeachmeGradeController;
use App\Http\Controllers\GlobalDetails\TeachmePackageController;
use App\Http\Controllers\GlobalDetails\TeachmeCurriculumController;
use App\Http\Controllers\GlobalDetails\TeachmeReviewController;
use App\Http\Controllers\GlobalDetails\TeachmeLocationController;
use App\Http\Controllers\Translation\LanguageController;
use App\Http\Controllers\Settings\GlobalSettingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\FindTutorController;
use App\Http\Controllers\Payment\TeachmePaymentController;


// accounts
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('/login-admin');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');


Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword-email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotpassword.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('showResetForm');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');



Route::middleware(['auth'])->group(function () {
    // TutorController
    Route::get('dashboard/tutor', [TutorController::class, 'index'])->name('tutor.index');
    Route::post('/tutor', [TutorController::class, 'store'])->name('tutor.store');
    Route::get('dashboard/tutor/{tutor}', [TutorController::class, 'show'])->name('tutor.show');
    Route::put('/tutor/{tutor}', [TutorController::class, 'update'])->name('tutor.update');
    Route::delete('/tutor/{tutor}', [TutorController::class, 'destroy'])->name('tutor.destroy');

    Route::get('/subscription_active/{id}', [RegisterController::class, 'subscription_active'])->name('subscription_active');
    Route::delete('users/{user}', [RegisterController::class, 'destroy'])->name('users.destroy');
    Route::put('/dashboard/profile/{user}', [RegisterController::class, 'update_profile'])->name('update_profile.update');


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



// subject
    Route::get('dashboard/subject', [TeachMeSubjectController::class, 'index'])->name('subject.index');
    Route::post('subject', [TeachMeSubjectController::class, 'store'])->name('subject.store');
    Route::put('subject/{subject}', [TeachMeSubjectController::class, 'update'])->name('subject.update');
    Route::delete('subject/{subject}', [TeachMeSubjectController::class, 'destroy'])->name('subject.destroy');

// grade
    Route::get('dashboard/grade', [TeachmeGradeController::class, 'index'])->name('grade.index');
    Route::post('grade', [TeachmeGradeController::class, 'store'])->name('grade.store');
    Route::put('grade/{grade}', [TeachmeGradeController::class, 'update'])->name('grade.update');
    Route::delete('grade/{grade}', [TeachmeGradeController::class, 'destroy'])->name('grade.destroy');

// package
    Route::get('dashboard/package', [TeachmePackageController::class, 'index'])->name('package.index');
    Route::post('package', [TeachmePackageController::class, 'store'])->name('package.store');
    Route::put('package/{package}', [TeachmePackageController::class, 'update'])->name('package.update');
    Route::delete('package/{package}', [TeachmePackageController::class, 'destroy'])->name('package.destroy');

// curriculum
    Route::get('dashboard/curriculum', [TeachmeCurriculumController::class, 'index'])->name('curriculum.index');
    Route::post('curriculum', [TeachmeCurriculumController::class, 'store'])->name('curriculum.store');
    Route::put('curriculum/{curriculum}', [TeachmeCurriculumController::class, 'update'])->name('curriculum.update');
    Route::delete('curriculum/{curriculum}', [TeachmeCurriculumController::class, 'destroy'])->name('curriculum.destroy');
// payment
    Route::get('dashboard/payment', [TeachmeCurriculumController::class, 'payment'])->name('payment');

// review
    Route::get('dashboard/review', [TeachmeReviewController::class, 'index'])->name('review.index');
    Route::post('review', [TeachmeReviewController::class, 'store'])->name('review.store');
    Route::put('review/{review}', [TeachmeReviewController::class, 'update'])->name('review.update');
    Route::delete('review/{review}', [TeachmeReviewController::class, 'destroy'])->name('review.destroy');

// location
    Route::get('dashboard/location', [TeachmeLocationController::class, 'index'])->name('location.index');
    Route::post('location', [TeachmeLocationController::class, 'store'])->name('location.store');
    Route::put('location/{location}', [TeachmeLocationController::class, 'update'])->name('location.update');
    Route::delete('location/{location}', [TeachmeLocationController::class, 'destroy'])->name('location.destroy');

//menu
    Route::get('dashboard/menu', [TeachMeSubjectController::class, 'menu_index'])->name('menu.index');
    Route::post('menu', [TeachMeSubjectController::class, 'menu_store'])->name('menu.store');
    Route::put('menu/{menu}', [TeachMeSubjectController::class, 'menu_update'])->name('menu.update');
    Route::delete('menu/{menu}', [TeachMeSubjectController::class, 'menu_destroy'])->name('menu.destroy');

    Route::get('/dashboard/settings/general-settings', [GlobalSettingController::class, 'index'])->name('index.general_settings');
    Route::post('/set_WebGeneralSetting', [GlobalSettingController::class, 'set_WebGeneralSetting'])->name('set_WebGeneralSetting');
    Route::resource('all_languages', LanguageController::class);



 

    Route::post('/addmoney/stripe', [TeachmePaymentController::class, 'postPaymentStripe'])->name('addmoney.paystripe');
    Route::get('plans/{plan}', [TeachmePaymentController::class, 'show'])->name("plans.show");
    Route::get('/paymentcancel', [TeachmePaymentController::class, 'paymentcancel'])->name('paymentcancel');
    Route::get('/cancel-subscribe/{stripe_id}', [TeachmePaymentController::class, 'cancel_subscribe'])->name('cancel_subscribe');



});


Route::post('webhook', [TeachmePaymentController::class, 'handleWebhook'])->name('webhook');

// website
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/how-it-works', [HomeController::class, 'how_it_works'])->name('how.it.works');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact.us');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/refund-policy', [HomeController::class, 'refund_policy'])->name('refund_policy');
Route::get('/terms-of-use', [HomeController::class, 'terms_of_use'])->name('terms_of_use');
Route::get('/language/{code}', [HomeController::class, 'home_change_lang'])->name('home_change_lang');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog_details', [HomeController::class, 'blog_details'])->name('blog_details');
Route::get('/page/{slug}', [HomeController::class, 'webpage'])->name('webpage');
Route::get('/tags/{slug}', [HomeController::class, 'tags'])->name('tags');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

Route::get('/dashboard/contacts', [HomeController::class, 'get_teachme_contacts'])->name('get_teachme_contacts');
Route::post('/add_teachme_contacts', [HomeController::class, 'add_teachme_contacts'])->name('add_teachme_contacts');


Route::get('/find-tutors', [FindTutorController::class, 'index'])->name('find.tutors');

Route::get('/tutor-profile/{name}/{tutor_id}', [FindTutorController::class, 'tutor_profile'])->name('tutor.profile');
