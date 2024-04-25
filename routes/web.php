<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("auth/login", [AuthController::class, "showLoginForm"]); // Dengan nama route
Route::post("auth/login", [AuthController::class, "login"]);
Route::get("generateAkun", [AuthController::class, "generateAkun"]);

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("auth/logout", [AuthController::class, "logout"])->name("signout");
