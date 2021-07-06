<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});
Route::get('/notifications', function () {
    return view('welcome');
});
Route::get('/favorities', function () {
    return view('welcome');
});
Route::get('/creator', function () {
    return view('welcome');
});
Route::get('/editor', function () {
    return view('welcome');
});
Route::get('/thread', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('welcome');
});
Route::get('/profile/settings', function () {
    return view('welcome');
});
Route::get('/verify', function () {
    return view('welcome');
});
