<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [
        'as' => 'index-admin',
        'uses' => 'Admin\DashboardController@index',
    ]);
});

//@todo: this should be rewritten to separate routes for more flexible interaction in the future
Route::auth();
