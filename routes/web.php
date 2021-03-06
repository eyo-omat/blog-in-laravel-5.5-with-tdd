<?php

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

Auth::routes();

Route::view('/blog/create','post.create')->middleware('auth');
Route::post('/post','PostsController@store');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/blog/{post}/comment','CommentController@store')->name('addcomment');
});

Route::get('/blog','PostsController@index')->name('blog');
Route::get('/blog/{post}','PostsController@show');
