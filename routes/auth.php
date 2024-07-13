<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.store');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/forget-password',[AuthController::class,'forgetPasswordLoad'])->name('forgetpassword.load');
Route::post('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetpassword');
Route::get('/reset-password',[AuthController::class,'resetPasswordLoad']);
Route::post('/reset-password',[AuthController::class,'resetPassword'])->name('restPassword');

Route::get('/logout',[AuthController::class,'logOut'])->name('logout');


