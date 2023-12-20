<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/users'], function () {
    Route::get('/', [UsersController::class, 'getUsers'])->name('get-users');
    Route::get('/{userId}', [UsersController::class, 'getUser'])->name('get-user');
    Route::get('/{userId}/profile', [UsersController::class, 'getUserProfile'])->name('get-user-profile');
    Route::post('/{userId}/profile', [UsersController::class, 'updateUserProfile'])->name('update-user-profile');
});
