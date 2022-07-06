<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');
Route::middleware('auth')->group(function () {

    Route::controller(WebController::class)->group(function () {
        Route::get('/', 'home')->name('web.home');

        Route::get('/users', 'users')->name('web.users');

        Route::get('/users/create', 'create')->name('web.users.create');
        Route::post('/users/store', 'store')->name('web.users.store');

        Route::get('/users/{id}/edit', 'edit')->name('web.users.edit');

        Route::get('/settings', 'settings')->name('web.settings');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
