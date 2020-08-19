<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MenuController extends Controller
{
    //成功登录后显示的菜单
    public function display_menu()
    {
        //
        if(Session::has('valid_user'))
        {
            echo Session::get('valid_user');
        }
        else
        {
            echo "false";
        }
    }
}
