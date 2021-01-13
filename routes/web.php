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
    Route::post('/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/{slug}', 'PostController@show')->name('post.show');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
});


Route::group(['prefix' => 'user'], function () {
    Route::get('/user', 'UsersController@getIndex')->name('user.list');
    Route::get('/create', 'UsersController@getCreate')->name('user.create');
    Route::post('/store', 'UsersController@postStore')->name('user.store');
    Route::get('/edit/{id}', 'UsersController@getEdit')->name('user.edit');
    Route::post('/update/{id}', 'UsersController@postUpdate')->name('user.update');
    Route::post('/delete/{id}', 'UsersController@postDelete')->name('user.delete');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/view', 'ProfileController@getIndex')->name('profile.view');
    Route::get('/edit/{id}', 'ProfileController@getEdit')->name('profile.edit');
    Route::post('/update/{id}', 'ProfileController@postUpdate')->name('profile.update');
    Route::get('/password/view', 'ProfileController@getPasswordView')->name('profile.password_view');
    Route::post('/password/update', 'ProfileController@postPasswordUpdate')->name('profile.pwd_update');
});

