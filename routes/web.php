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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// check for logged in user
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function()
{
 
    Route::get('/', ['uses' => 'PostController@index', 'as' => 'admin.index']);
    Route::resource('posts', 'PostController');

});

Route::resource('post', 'Admin\PostController', ['only' => [
    'show'
]]);

Route::resource('category', 'CategoryController', ['only' => [
    'index', 'show'
]]);

Route::resource('comment', 'CommentController', ['only' => [
    'show', 'store'
]]);
Route::get('post/comments/{id}', ['uses' => 'CommentController@index']); //post comments

