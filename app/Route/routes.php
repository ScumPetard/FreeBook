<?php

Route::get('/', function () {
    return view('home.index.index');
});

Route::group(['prefix' => 'member', 'namespace' => 'Home'], function () {
    Route::any('/sign','SignController@sign');
    Route::any('/signup','SignController@signUp');
});



