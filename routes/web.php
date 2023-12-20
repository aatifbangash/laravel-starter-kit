<?php

use App\Livewire\Admin\Login;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Admin\Users\ListUsers;
use App\Livewire\Admin\Users\NewUser;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)
    ->middleware('auth')
    ->name('home');

Route::prefix('admin')->group(function () {

    // Dashboard routes
    Route::get('/', Home::class)
        ->middleware('auth')
        ->name('home');
    Route::get('/login', Login::class)
        ->middleware('guest')
        ->name('login');

    // User routes
    Route::prefix('users')->group(function () {
        Route::get('/list-users', ListUsers::class)
            ->middleware('auth')
            ->name('list-users');
        Route::get('/new-user', NewUser::class)
            ->middleware('auth')
            ->name('new-user');
        Route::get('/edit-user/{user}', EditUser::class)
            ->middleware('auth')
            ->name('edit-user');
    });
});
