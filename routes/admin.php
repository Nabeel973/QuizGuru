<?php

Route::group([
    'namespace' => 'Auth',
], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'middleware' => [
        'auth:admin',
    ],
], function () {

    // for all admins
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('home', 'AdminController@index')->name('dashboard');
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    // for SA
    Route::group(['middleware' => ['role:SA']], function () {
        //
    });

    // for Admin
    Route::group(['middleware' => ['role:SA|Admin']], function () {
        // users
        Route::group(['prefix' => 'users', 'as' => 'users.',], function () {
            Route::get('all', 'AdminUserController@index')->name('index');
        });
    });

    // for Moderator
    Route::group(['middleware' => ['role:SA|Admin|Moderator']], function () {
        //
    });

});
