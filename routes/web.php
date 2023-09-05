<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
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

Route::middleware(['web', 'blockAccess'])->group(function () {
    Route::get('/dashboard',[RegisterController::class,'dashboard'])->name('dashboard');

});


Route::middleware(['web', 'ifLogin'])->group(function () {
    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class,'add'])->name('login.submit');
    Route::get('/enter_email',[ForgetPasswordController::class,'email'])->name('enter-email');
    Route::post('/otp',[ForgetPasswordController::class,'otp'])->name('enter-otp');
    Route::post('/verify-otp',[ForgetPasswordController::class,'verifyOtp'])->name('verify-otp');
    Route::post('/change-password',[ForgetPasswordController::class,'changePasswords'])->name('change-password');
    Route::post('/check-password',[ForgetPasswordController::class,'checkPasswords'])->name('passwords.check');

});


Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'add'])->name('register.submit');


Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/show_chats',[ChatController::class,'showChats'])->name('chat.page');
Route::post('/chat/{user}/{sender}',[ChatController::class,'startChat'])->name('start.chat');
Route::post('/broadcast',[MessageController::class,'broadcast'])->name('broadcast');
Route::post('/receive',[MessageController::class,'receive'])->name('receive');

Route::post('/search',[ChatController::class,'search'])->name('search.chat');

