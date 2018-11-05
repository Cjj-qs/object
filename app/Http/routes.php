<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 后台登录页面
Route::get('/login',function(){
	echo '登录页面';
});

/**
 * 后台路由
 */
// 后台首页
Route::get('/admin/index','Admin\AdminController@index');

// 后台用户管理路由
Route::resource('/admin/users','Admin\UsersController');




















//
Route::resource('/admin/cates','Admin\CatesController');
Route::resource('/index','Home\IndexController');
Route::resource('/admin/sow','Admin\SowController');