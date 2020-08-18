<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutPutController extends Controller
{
    //登录视图
    public function login()
    {
        $title = '';
        return view('login',compact('title'));
    }
    //注册视图
    public function register()
    {
        $title = 'User Registration';
        return view('register',compact('title'));
    }
    //忘记 视图
    public function forgot_form()
    {
        $title = 'Reset password';
        return view('forgot_form',compact('title'));
    }

}