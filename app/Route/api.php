<?php


Route::group(['prefix' => 'api', 'namespace' => 'Service'], function () {

    /** 用户注册判断email是否唯一 */
    Route::get('/member/emailunique','MemberController@emailUnique');

});

