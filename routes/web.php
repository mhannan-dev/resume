<?php

Route::get('/', 'HomeController@index')->name('frontend.home');
Route::post('/send-message', 'ContactController@store')->name('save_contact');


Auth::routes();
Route::group(array('middleware' => 'auth'), function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Post
    Route::resource('/post', 'PostController')->except('show','update');
    Route::post('/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/{slug}', 'PostController@show')->name('post.show');
    // Post

    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::resource('/skill', 'SkillController');
    Route::resource('/experience', 'ExperienceController');
    Route::resource('/project', 'ProjectController');

    

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

