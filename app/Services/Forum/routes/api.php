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
use App\Services\Forum\Http\Controllers\TagController;
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
    Route::middleware('auth:api')->post('/follow-thread', [ThreadController::class, 'followThread']);
    Route::middleware('auth:api')->post('/vote-for-thread', [ThreadController::class, 'voteForThread']);

    /**
     * Post
     */
    Route::middleware('auth:api')->post('/add-post', [PostController::class, 'addPost']);
    Route::middleware('auth:api')->post('/delete-post', [PostController::class, 'deletePost']);
    Route::middleware('auth:api')->post('/edit-post', [PostController::class, 'editPost']);
    Route::middleware('auth:api')->get('/get-post', [PostController::class, 'getPost']);
    Route::middleware('auth:api')->get('/get-posts', [PostController::class, 'getPosts']);
    Route::middleware('auth:api')->post('/accept-post', [PostController::class, 'acceptPost']);
    Route::middleware('auth:api')->get('/get-awaiting-posts', [PostController::class, 'getAwaitingPosts']);

    /**
     * Comment
     */
    Route::middleware('auth:api')->post('/add-comment', [CommentController::class, 'addComment']);
    Route::middleware('auth:api')->post('/delete-comment', [CommentController::class, 'deleteComment']);
    Route::middleware('auth:api')->post('/edit-comment', [CommentController::class, 'editComment']);
    Route::middleware('auth:api')->get('/get-comment', [CommentController::class, 'getComment']);
    Route::middleware('auth:api')->get('/get-comments', [CommentController::class, 'getComments']);

    /**
     * Tag
     */
    Route::middleware('auth:api')->post('/add-tag', [TagController::class, 'addTag']);
    Route::middleware('auth:api')->post('/delete-tag', [TagController::class, 'deleteTag']);
    Route::middleware('auth:api')->get('/get-tag', [TagController::class, 'getTag']);
    Route::middleware('auth:api')->get('/get-tags', [TagController::class, 'getTags']);
});
