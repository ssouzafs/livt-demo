<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');

Route::middleware('auth')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/', 'home')->name('auth.login.home');
        Route::get('/settings', 'settings')->name('auth.login.settings');
        Route::post('/logout', 'logout')->name('auth.login.logout');
    });

    Route::resource('/users', UserController::class)->except(['show']);

//    Route::controller(UserController::class)->group(function () {
//        Route::get('/users', 'users')->name('auth.users');
//
//        Route::get('/users/create', 'create')->name('auth.users.create');
//        Route::post('/users/store', 'store')->name('auth.users.store');
//
//        Route::get('/users/{id}/edit', 'edit')->name('auth.users.edit');
//        Route::put('/users/update/{id}', 'update')->name('auth.users.update');
//    });
});
