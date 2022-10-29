<?php
echo "ljljkj";
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {

        Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('show')
            ->whereNumber('user');

        Route::post('/users', [UserController::class, 'store'])->name('store');

        Route::patch('/users/{user}', [UserController::class, 'update'])->name('update');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
