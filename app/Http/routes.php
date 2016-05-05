<?php
Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'Admin\DashboardController@index')->name('index-admin');
    Route::get('/users', 'Admin\DashboardController@usersManage')->name('users-admin');

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
