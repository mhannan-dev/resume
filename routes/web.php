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


Route::group(['prefix' => 'frontend'], function () {
    Route::post('/send-message', 'ContactController@store')->name('save_contact');
});



Auth::routes();


Route::group(array('middleware' => 'auth'), function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('/post', 'PostController')->except('show','update');
    Route::post('/update/{id}', 'PostController@update')->name('blog.update');
    Route::get('/post/{slug}', 'PostController@show')->name('post.show');

    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');



});
