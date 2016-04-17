<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('blank', [
        'as' => 'blank',
        'uses' => 'AdminController@getBlank',
    ]);

});