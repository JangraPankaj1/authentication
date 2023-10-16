<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;



Route::get('/',[HomeController::class,'index'])->name('home');
// Route::get('dashboard',[HomeController::class,'test']);

//otp submit


Route::get('/verification/{id}',[AuthController::class,'verification']);
Route::post('/verified',[AuthController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[AuthController::class,'resendOtp'])->name('resendOtp');


//end

// Route::get('/dashboard',[AuthController::class,'loadDashboard'])->name('dashboard');


Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::get('user/verify/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify');
Route::get('page/error', [AuthController::class, 'showErrorPage'])->name('page.error');


Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [AuthController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::middleware('auth:web')->group(function(){

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('change-password', [AuthController::class, 'changePasswordForm'])->name('password.change.form');
        Route::post('change-password', [AuthController::class, 'changePasswordPost'])->name('password.change.post');
        
});


    
   
