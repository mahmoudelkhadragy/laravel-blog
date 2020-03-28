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

//all posts
Route::get('/posts', 'PostController@index')->name('posts.index');

//create post
Route::get('/posts/create', 'PostController@create')->name('posts.create');

//route for ranking the submition and storing the data into db
Route::post('/posts', 'PostController@store')->name('posts.store');

//post details
Route::get('/posts/{post}', 'PostController@show')->name('posts.show'); //name rout to url
