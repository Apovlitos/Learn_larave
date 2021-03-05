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

Route::get("/", function () { return redirect(\route('posts.index')); });

Route::get('/posts/tags/{tag}', 'App\Http\Controllers\TagController@filter')->name('filter');

Route::resource('/posts', "App\Http\Controllers\PostController");

