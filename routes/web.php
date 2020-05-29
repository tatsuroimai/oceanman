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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/user', 'UserController@index')->name('user.index');

    Route::get('/user/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/edit', 'UserController@update')->name('user.update');

    Route::get('/user/changepassword', 'UserController@showChangePasswordForm');
    Route::post('/user/changepassword', 'UserController@changePassword')->name('user.changepassword');

    Route::get('/user/delete', 'UserController@delete')->name('user.delete');
    Route::post('/user/delete', 'UserController@remove')->name('user.remove');

    Route::get('/user/show', 'UserController@show')->name('user.show');

    
    Route::get('/', 'PostController@index')->name('post.index');

    Route::get('/post/add', 'PostController@add')->name('post.add');
    Route::post('/post/add', 'PostController@create')->name('post.create');

    Route::get('/post/show', 'PostController@show')->name('post.show');

    Route::get('/post/edit', 'PostController@edit')->name('post.edit');
    Route::post('/post/edit', 'PostController@update')->name('post.update');

    Route::get('/post/delete', 'PostController@delete')->name('post.delete');
    Route::post('/post/delete', 'PostController@remove')->name('post.remove');

    Route::get('/post/search', 'PostController@search')->name('post.search');


    Route::post('/comment/add', 'CommentController@add')->name('comment.add');
});