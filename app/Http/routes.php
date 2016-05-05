<?php
Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('index-admin');
});

Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', 'Auth\AuthController@login')->name('login');
    Route::post('/login', 'Auth\AuthController@loginPost')->name('login.post');

    Route::get('/password/reset', 'Auth\PasswordController@showSendEmailForResetForm')->name('password-reset.email');
    Route::get('/password/reset/{email}/{token}', 'Auth\PasswordController@showResetForm')->name('password-reset');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail')->name('password-email.post');
    Route::post('/password/reset', 'Auth\PasswordController@resetPost')->name('password-reset.post');

});
