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