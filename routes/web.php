<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "noLogin"], function () {

    Route::get("auth/login", [AuthController::class, "showLoginForm"])->name('login'); // Dengan nama route
    Route::post("auth/login", [AuthController::class, "login"]);
    Route::get("generateAkun", [AuthController::class, "generateAkun"]);
});

Route::get("/test", [TransaksiController::class, "test"]);

Route::group(["middleware" => "isLogin"], function () {

    Route::get('/', [DashboardController::class, "index"])->name("dashboard");

    Route::resource('detailtransaksi', DetailTransaksiController::class);
    Route::resource('hutang', HutangController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaksi/nota/{id?}', [TransaksiController::class, 'generate_nota']);
    Route::resource('produk', ProdukController::class);
    Route::resource('transaksi', TransaksiController::class);

    Route::resource('akun', AkunController::class);

    Route::get("auth/logout", [AuthController::class, "logout"])->name("signout");
});
