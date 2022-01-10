<?php

Route::get('/', function () {
    return view('welcome');
});



// User
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/top', 'HomeController@index')->name('top');
});

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Admin\Auth\RegisterController@register')->name('admin.register');
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.email');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('/top', 'Admin\HomeController@index')->name('admin.top');

    // ユーザ管理
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'Admin\UserController@index')->name('admin.user');
    });

    // 単語管理
    Route::group(['prefix' => 'word'], function () {
        Route::get('', 'Admin\WordController@index')->name('admin.word');
        Route::get('/create', 'Admin\WordController@create')->name('admin.word.create');
        Route::post('/store', 'Admin\WordController@store')->name('admin.word.store');
        Route::get('/show/{id}', 'Admin\WordController@show')->name('admin.word.show');
        Route::post('/update', 'Admin\WordController@update')->name('admin.word.update');
        Route::post('/delete', 'Admin\WordController@destroy')->name('admin.word.delete');
    });

    // 問題管理
    Route::group(['prefix' => 'question'], function () {
        Route::get('', 'Admin\QuestionController@index')->name('admin.question');
    });
});
