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

Route::get('/', 'PostsController@index');

Auth::routes();

Route::group(['prefix' => 'post'], function() {
    Route::get('index', 'PostsController@index')->name('post.index');
    Route::get('show/{id}', 'PostsController@show')->name('post.show');
});

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function() {
    Route::get('create', 'PostsController@create')->name('post.create');
    Route::post('store', 'PostsController@store')->name('post.store');
    Route::get('edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('update/{id}', 'PostsController@update')->name('post.update');
    Route::post('destroy/{id}', 'PostsController@destroy')->name('post.destroy');
});

Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function() {
    Route::post('store/{post}', 'CommentsController@store')->name('comment.store');
});