<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfilController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::prefix('authentication')->name('authentication.')->group(function () {
//     Route::post('login', [AuthController::class, 'login'])->name('login');
//     Route::post('register', [AuthController::class, 'register'])->name('register');
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// });
Route::prefix('authenticate')->name('authenticate.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::prefix('profile')->name('profile.')->group(function () {
    Route::resource('profil', ProfilController::class);
});
Route::get('/user', [AuthController::class, 'user']);

