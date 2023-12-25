<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController as dashboard;
use App\Http\Controllers\backend\AuthenticationController as auth;
use App\Http\Controllers\backend\UserController as user;

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
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'signOut'])->name('logOut');


Route::middleware(['checkauth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
});
Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
});


