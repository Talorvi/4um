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

// Prefix: /api/forum
use App\Services\Forum\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'forum'], function() {

    Route::middleware('auth:api')->post('/add-thread', [ThreadController::class, 'addThread']);
    Route::middleware('auth:api')->post('/delete-thread', [ThreadController::class, 'deleteThread']);
    Route::middleware('auth:api')->post('/edit-thread', [ThreadController::class, 'editThread']);
    Route::middleware('auth:api')->get('/get-thread', [ThreadController::class, 'getThread']);
    Route::middleware('auth:api')->get('/get-threads', [ThreadController::class, 'getThreads']);
});
