<?php

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [
        'as' => 'index-admin',
        'uses' => 'Admin\DashboardController@index',
    ]);

});