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
use App\Services\Forum\Http\Controllers\CommentController;
use App\Services\Forum\Http\Controllers\PostController;
use App\Services\Forum\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'forum'], function() {
    /**
     * Thread
     */
    Route::middleware('auth:api')->post('/add-thread', [ThreadController::class, 'addThread']);
    Route::middleware('auth:api')->post('/delete-thread', [ThreadController::class, 'deleteThread']);
    Route::middleware('auth:api')->post('/edit-thread', [ThreadController::class, 'editThread']);
    Route::middleware('auth:api')->get('/get-thread', [ThreadController::class, 'getThread']);
    Route::middleware('auth:api')->get('/get-threads', [ThreadController::class, 'getThreads']);

    /**
     * Post
     */
    Route::middleware('auth:api')->post('/add-post', [PostController::class, 'addPost']);
    Route::middleware('auth:api')->post('/delete-post', [PostController::class, 'deletePost']);
    Route::middleware('auth:api')->post('/edit-post', [PostController::class, 'editPost']);
    Route::middleware('auth:api')->get('/get-post', [PostController::class, 'getPost']);
    Route::middleware('auth:api')->get('/get-posts', [PostController::class, 'getPosts']);

    /**
     * Comment
     */
    Route::middleware('auth:api')->post('/add-comment', [CommentController::class, 'addComment']);
    Route::middleware('auth:api')->post('/delete-comment', [CommentController::class, 'deleteComment']);
    Route::middleware('auth:api')->post('/edit-comment', [CommentController::class, 'editComment']);
    Route::middleware('auth:api')->get('/get-comment', [CommentController::class, 'getComment']);
    Route::middleware('auth:api')->get('/get-comments', [CommentController::class, 'getComments']);
});
