<?php


Route::group(['prefix' => 'api', 'namespace' => 'Service'], function () {

    Route::get('/member/emailunique','MemberController@emailUnique');

});

