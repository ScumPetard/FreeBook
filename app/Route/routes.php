<?php
Route::group(['namespace' => 'Home'], function () {

    Route::get('/', function () {
        return view('home.index.index');
    });

    Route::any('/books', 'BookController@index');

    Route::group(['prefix' => 'member'], function () {
        /** 登录 */
        Route::any('/sign','SignController@sign');

        /** 注册 */
        Route::any('/signup','SignController@signUp');

        /** 注册成功 */
        Route::any('/signup-success/{id}','SignController@signUpSuccess');

        /** 邮箱验证 */
        Route::get('/signup-verify/{token}','SignController@signUpVerify');

        /**  */
        Route::get('/signout','SignController@signOut');

        /** 个人中心 */
        Route::get('/center','MemberController@center');

        /** 修改资料 */
        Route::any('/data','MemberController@data');

        /** 分享 */
        Route::any('/share','MemberController@share');
    });
});




