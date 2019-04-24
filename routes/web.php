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

Route::middleware(['auth'])->group(function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/new_post', 'PostController@index')->name('new_post');
	Route::get('/edit_post/{id}', 'PostController@edit')->name('edit_post');
	Route::post('/save_post/{id?}', 'PostController@store')->name('store');
	Route::delete('/delete_post/{id}', 'PostController@destroy')->name('delete_post');
});

Route::get('/posts', 'PostController@list')->name('list');
Route::get('/view_post/{id}', 'PostController@show')->name('show_post');
Route::post('/save_comment/{id}', 'CommentController@store')->name('save_comment');
