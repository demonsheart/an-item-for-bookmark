<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//登录界面
Route::get('/', 'OutPutController@login');
//注册界面
Route::get('/register', 'OutPutController@register');
//注册表单验证
Route::post('/auth_register','MemberController@auth_register');
//忘记密码界面
Route::get('/forgot_form', 'OutPutController@forgot_form');
//重置密码
Route::post('/reset_passwd','MemberController@reset_passwd');
//验证用户路由
Route::post('/auth_login', 'MemberController@auth_login');
//成功登录路由
Route::get('/menu','MenuController@display_menu');
//删除书签
Route::any('/delete_bms','MenuController@delete_bms');
//添加书签表格
Route::get('/add_bm_form','MenuController@add_bm_form');
//添加书签
Route::any('/add_bms','MenuController@add_bms');
//注销
Route::get('/logout','MenuController@logout');
//更改密码表格
Route::get('/change_passwd_form','MenuController@change_passwd_form');
//更改密码
Route::post('/change_passwd','MenuController@change_passwd');
//推荐书签
Route::any('/recommend','MenuController@recommend');