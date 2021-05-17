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

// Prefix: /api/authentication
use App\Services\Authentication\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'authentication'], function() {

    Route::post('/register', [AuthenticationController::class, 'registerUser']);

    Route::post('/login', [AuthenticationController::class, 'loginUser']);

});
