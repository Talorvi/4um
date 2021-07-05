<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'forum'], function() {

    // The controllers live in src/Services/Forum/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function() {
        return view('forum::welcome');
    });

});
