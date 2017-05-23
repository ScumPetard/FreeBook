<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    /** 登录 */
    Route::any('/', 'IndexController@login')->name('admin.login');

    /** 登出 */
    Route::get('/logout', 'IndexController@logout')->name('admin.logout');

    Route::group(['middleware' => 'must.admin'], function () {

        /** 首页 */
        Route::get('/index','IndexController@index')->name('admin.index');


        /* --------------- 管理员管理 --------------- */

        /* 管理员管理 */
        Route::get('/admin','AdminController@index')->name('admin.admin.index');

        /** 添加管理员 */
        Route::post('/admin/create','AdminController@create')->name('admin.admin.create');

        /* 编辑管理员 */
        Route::post('/admin/edit/{id}','AdminController@edit')->name('admin.admin.edit');

        /* 删除管理员 */
        Route::get('/admin/destroy/{id}','AdminController@destroy')->name('admin.admin.destroy');




        /* --------------- 权限管理 --------------- */

        /* 权限管理首页 */
        Route::get('/permission','PermissionController@index')->name('admin.permission.index');

        /* 添加权限 */
        Route::post('/permission/create','PermissionController@create')->name('admin.permission.create');

        /* 编辑权限 */
        Route::post('/permission/edit/{id}','PermissionController@edit')->name('admin.permission.edit');

        /* 删除权限 */
        Route::get('/permission/destroy/{id}','PermissionController@destroy')->name('admin.permission.destroy');

        /** Book管理 */
        Route::get('/book','BookController@index');


    });

});

