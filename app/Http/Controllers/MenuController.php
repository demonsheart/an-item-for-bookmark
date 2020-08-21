<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Bookmark;
use App\Rules\new_url;//自定义验证器
use Illuminate\Support\Facades\DB;

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

    //更改密码表格
    public function change_passwd_form()
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        //返回表格
        $title = 'Change password';
        return view('display_change_passwd_form',compact('title'));
    }

    //更改密码
    public function change_passwd(Request $request)
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        if(Input::method() == 'POST')
        {
            //自动验证 (调用laravel表单验证)
            $this -> validate($request,[
                //具体规则
                'old_passwd' => 'required|min:8|max:20',
                'new_passwd' => 'required|min:8|max:20',
                'new_passwd2' => 'required|min:8|max:20|same:new_passwd',
            ]);
            //定义变量
            $username = Session::get('valid_user');
            $old_pass = $request['old_passwd'];
            $new_pass = sha1($request['new_passwd']);//散列值
            //密码检验
            $model = new User();
            $result = $model->where('username',$username)->where('passwd',sha1($old_pass))->count();
            if($result != 0)//密码正确
            {
                $model->where('username',$username)->update(['passwd' => $new_pass]);
                $title = 'Sucessfully';
                //重置密码应注销会话并重定向至登录界面
                Session::forget('valid_user');
                return view('/true_change',compact('title'));
            }
            else//密码错误
            {
                $title = 'Problem:';
                return view('/fail_change',compact('title'));
            }
        }
        else
        {
            return redirect('/change_passwd_form');
        }
    }

    //删除书签
    public function delete_bms(Request $request)
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        //获取删除数组
        $del = $request['del_me'];
        $username = Session::get('valid_user');
        //检验值非空
        if($del == null)
        {
            return redirect('/menu');
        }
        //开始删除
        $model = new Bookmark();
        foreach($del as $key => $value)
        {
            $model->where('username',$username)->where('bm_URL',$value)->delete();
        }
        return redirect('/menu');
    }

    //推荐书签
    public function recommend()
    {
        //session验证
        if(!Session::has('valid_user'))
        {
            return redirect('/');
        }
        $username = Session::get('valid_user');
        $popularity = 0; //默认值为 1 可修改
        $query = "select bm_URL
	          from bookmark
	          where username in
	   	        (select distinct(b2.username)
              from bookmark b1, bookmark b2
		          where b1.username='".$username."'
                and b1.username != b2.username
                and b1.bm_URL = b2.bm_URL)
	            and bm_URL not in
 		            (select bm_URL
				        from bookmark
				        where username='".$username."')
            group by bm_url
            having count(bm_url)>".$popularity;
        $result = DB::select($query);
        if($result == null)//查找为空
        {
            $title = '';
            return view('fail_recommend',compact('title'));
        }
        else //找到
        {
            $title = '';
            return view('true_recommend',compact('title','result'));
        }
    }
}