<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home')->name('web.home');
    Route::get('/users', 'users')->name('web.users');
    Route::get('/settings', 'settings')->name('web.settings');
    Route::post('/logout', 'logout')->name('web.logout');
});
