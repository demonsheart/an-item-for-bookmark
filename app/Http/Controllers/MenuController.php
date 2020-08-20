<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Bookmark;
use App\Rules\new_url;

class MenuController extends Controller
{
    //成功登录后显示的菜单
    public function display_menu()
    {
        if(Session::has('valid_user'))
        {
            //登陆成功 寻找书签
            $username = Session::get('valid_user');
            $model = new Bookmark();
            $result = $model -> where('username',$username) -> select('bm_URL') -> get() -> toArray();
            $title = 'Home';
            return view('menu',compact('title','result'));
        }
        else
        {
            $title = '';
            return view('fail_login',compact('title'));
        }
    }

    //添加书签表格
    public function add_bm_form()
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        $title = 'Add Bookmarks';
        return view('add_bm_form',compact('title'));
    }

    //添加书签
    public function add_bms(Request $request)
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }

        //自定义规则验证
        //位于App\Rules下
        //第一层验证 验证URL是否有效
        $request -> validate([
            'new_url' => ['required',new new_url],
        ]);
        
        //第二层验证 验证记录是否已经存在
        $url = $request['new_url'];
        $username = Session::get('valid_user');
        $model = new Bookmark();
        $result = $model->where('username',$username)->where('bm_URL',$url)->count();
        if($result == 0)
        {
            //记录不存在 写入数据库
            $model = new Bookmark();
            $model -> username = $username;
            $model -> bm_URL = $url;
            $model-> save();
            //重定向至Home
            return redirect('/menu');
        }
        else
        {
            $title = 'Problem:';
            return view('fail_add_bms',compact('title'));
        }
    }

    //注销
    public function logout()
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        //注销
        Session::forget('valid_user');
        return redirect('/');
    }

    //更改密码
    public function change_passwd_form()
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        //返回表格
    }
}