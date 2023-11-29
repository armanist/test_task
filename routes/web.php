<?php

use App\Http\Controllers\AccountConnectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailController;
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

Route::get('/', fn() => redirect('dashboard'));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/connect', [AccountConnectController::class, 'store'])->name('account.connect');

    Route::get('/disconnect', [AccountConnectController::class, 'destroy'])->name('account.disconnect');

    Route::get('/auth/microsoft/oauth2-callback', [AccountConnectController::class, 'store']);

    Route::group(['prefix' => 'emails'], function () {
        Route::get('/', [EmailController::class, 'index'])->name('emails');
        Route::get('/page/{email_id}', [EmailController::class, 'show'])->name('email.show');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
