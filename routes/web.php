<?php

// use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfilController;
// use App\Http\Livewire\Roles;
// use App\Http\Livewire\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class,'loginPage'])->name('login.page');
Route::get('/register', [AuthController::class,'show'])->name('register.page');
Route::post('/register', [AuthController::class,'registerProcess'])->name('register.process');
Route::post('/login', [AuthController::class,'loginProcess'])->name('login.process');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class,'show'])->name('profil');
    Route::post('/profil/createOrUpdate', [ProfilController::class,'store'])->name('profil.store');
    // Route::resource('/profil', ProfileController::class);
    Route::get('/dashboard', [FiturController::class, 'show'])->name('dashboard.user');
    Route::post('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/order/total', [OrderController::class, 'total'])->name('order.total');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/event', [FiturController::class, 'event'])->name('event');
    Route::get('/store', [FiturController::class, 'store'])->name('store');
    Route::get('/booking', [BookingController::class, 'show'])->name('booking');
    Route::post('/booking/create', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/history', [FiturController::class, 'history'])->name('history');
});
Route::middleware('auth')->group( function () {
//     Route::get('/roles',Roles::class)->name('roles');
//     Route::get('/users',Users::class)->name('users');
});