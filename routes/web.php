<?php

use App\Livewire\Admin\Login;
use App\Livewire\Admin\Pages\ListPages;
use App\Livewire\Admin\Permissions\EditPermission;
use App\Livewire\Admin\Permissions\ListPermissions;
use App\Livewire\Admin\Permissions\NewPermission;
use App\Livewire\Admin\Roles\AssignPermissions;
use App\Livewire\Admin\Roles\EditRole;
use App\Livewire\Admin\Roles\ListRoles;
use App\Livewire\Admin\Roles\NewRole;
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

    // Roles routes
    Route::prefix('roles')->group(function () {
        Route::get('/list-roles', ListRoles::class)
            ->middleware('auth')
            ->name('list-roles');
        Route::get('/new-role', NewRole::class)
            ->middleware('auth')
            ->name('new-role');
        Route::get('/edit-role/{role}', EditRole::class)
            ->middleware('auth')
            ->name('edit-role');
        Route::get('/assign-permissions/{role}', AssignPermissions::class)
            ->middleware('auth')
            ->name('assign-permissions');
    });

    // Permissions routes
    Route::prefix('permissions')->group(function () {
        Route::get('/list-permissions', ListPermissions::class)
            ->middleware('auth')
            ->name('list-permissions');
    });

    // Pages routes
    Route::prefix('pages')->group(function () {
        Route::get('/list-pages', ListPages::class)
            ->middleware('auth')
            ->name('list-pages');
    });
});
