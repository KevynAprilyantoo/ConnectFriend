<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TopUpController;

Route::get('/', function () {
    return view('landingpage.index');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');


Route::get('/payment/{price}', [PaymentController::class, 'showPaymentPage'])->name('payment.show');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Add the route for adding balance
Route::post('/payment/add-balance', [PaymentController::class, 'addBalance'])->name('add_balance');

Route::get('/payment/retry', [PaymentController::class, 'retryPayment'])->name('payment.retry');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home.index');
    Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile');
    Route::get('/top-up', [HomeController::class, 'topUp'])->name('home.topup');
    Route::get('/settings', [SettingController::class, 'index'])->name('home.settings');
    Route::get('/detail/{user}', [HomeController::class, 'detail'])->name('home.detail');

    Route::post('/settings', [SettingController::class, 'setAccountVisible'])->name('settings.visible');
    Route::post('/update-password', [SettingController::class, 'updatePassword'])->name('password.update');
    Route::post('/update-profile', [SettingController::class, 'updateProfile'])->name('profile.update');
    Route::get('/top-up/{amount}', [TopUpController::class, 'add'])->name('topup.add');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/friend-request/{friend}/{user}', [FriendController::class, 'sendRequest'])->name('friend.sendRequest');
    Route::get('accept-request/{user}/{friend}', [FriendController::class, 'acceptRequest'])->name('friend.acceptRequest');
    Route::get('remove-friend/{user}/{friend}', [FriendController::class, 'removeFriend'])->name('friend.removeFriend');
});

Route::get('/home2', function () {
    return view('home.index');
})->name('home');