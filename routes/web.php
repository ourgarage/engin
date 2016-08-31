<?php

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'Admin\DashboardController@index')->name('index-admin');

    Route::get('/users', 'Admin\UsersController@index')->name('admin-users-index');
    Route::get('/users/create', 'Admin\UsersController@create')->name('admin-users-create');
    Route::get('/users/{id}/edit', 'Admin\UsersController@edit')->name('admin-users-edit');
    Route::post('/users/{id?}', 'Admin\UsersController@store')->name('admin-users-store');
    Route::delete('/users/{id}', 'Admin\UsersController@destroy')->name('admin-users-destroy');
    Route::post('/users/status-update/{id}', 'Admin\UsersController@updateStatus')->name('admin-users-status-update');
    Route::get('/users/search', 'Admin\UsersController@searchUsers')->name('admin-users-search');

    Route::get('/site/settings', 'Admin\SiteSettingsController@getSettings')->name('admin-site-get-settings');
    Route::post('/site/settings', 'Admin\SiteSettingsController@saveSettings')->name('admin-site-save-settings');

});

Route::get('/logout', 'Admin\Auth\AuthController@logout')->name('logout');

Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', 'Admin\Auth\AuthController@login')->name('login');
    Route::post('/login', 'Admin\Auth\AuthController@loginPost')->name('login.post');

    Route::get('/password/reset', 'Admin\Auth\PasswordController@showSendEmailForResetForm')->name('password-reset.email');
    Route::get('/password/reset/{email}/{token}', 'Admin\Auth\PasswordController@showResetForm')->name('password-reset');
    Route::post('/password/email', 'Admin\Auth\PasswordController@sendResetLinkEmail')->name('password-email.post');
    Route::post('/password/reset', 'Admin\Auth\PasswordController@resetPost')->name('password-reset.post');

});
