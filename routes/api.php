<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'domains' . DIRECTORY_SEPARATOR . 'auth_api.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'domains' . DIRECTORY_SEPARATOR . 'users_api.php';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('health-check', fn() => response()->json([
        'data' => 'application is running.']
));
