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
//忘记密码界面
Route::get('/forgot_form', 'OutPutController@forgot_form');
//验证路由
Route::post('/member', 'MemberController@auth_login');
