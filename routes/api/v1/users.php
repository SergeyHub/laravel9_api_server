<?php

use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    //  'auth:api',
])
    ->name('users.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('show')->whereNumber('user');
        Route::post('/users', [UserController::class, 'store'])->name('store');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
