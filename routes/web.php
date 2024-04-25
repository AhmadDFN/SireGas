<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "noLogin"], function () {

    Route::get("auth/login", [AuthController::class, "showLoginForm"])->name('login'); // Dengan nama route
    Route::post("auth/login", [AuthController::class, "login"]);
    Route::get("generateAkun", [AuthController::class, "generateAkun"]);
});

Route::group(["middleware" => "isLogin"], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('transaksi', TransaksiController::class);

    Route::get("auth/logout", [AuthController::class, "logout"])->name("signout");
});
