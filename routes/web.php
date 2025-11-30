<?php

use App\Http\Middleware\checkLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([checkLogin::class])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('murid', [MuridController::class, 'index'])->name('murid.index');
    Route::get('murid/create', [MuridController::class, 'create'])->name('murid.create');
    Route::post('murid', [MuridController::class, 'store'])->name('murid.store');
    Route::get('murid/{id}/edit', [MuridController::class, 'edit'])->name('murid.edit');
    Route::put('murid/{id}', [MuridController::class, 'update'])->name('murid.update');
    Route::delete('murid/{id}', [MuridController::class, 'destroy'])->name('murid.destroy');

    Route::get('murid/import-page', [MuridController::class, 'importPage'])->name('murid.importPage');
    Route::post('murid/import', [MuridController::class, 'import'])->name('murid.import');

    Route::get('murid/export-page', [MuridController::class, 'exportPage'])->name('murid.exportPage');
    Route::get('export-murid', [MuridController::class, 'export'])->name('murid.export');
});
