<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Prefix: /api/user
use App\Services\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function() {

    // Controllers live in src/Services/User/Http/Controllers

    Route::middleware('auth:api')->get('/get-user', [UserController::class, 'getUser']);
    Route::middleware('auth:api')->get('/get-users', [UserController::class, 'getUsers']);
    Route::middleware('auth:api')->post('/edit-user', [UserController::class, 'editUser']);
    Route::middleware('auth:api')->post('/edit-avatar', [UserController::class, 'editAvatar']);

});
