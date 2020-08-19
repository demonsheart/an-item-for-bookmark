<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use Exception;

class MemberController extends Controller
{
    //用户认证
    public function auth_login(Request $request)
    {
        if(Input::method() == 'POST')
        {
            //自动验证 (调用laravel表单验证)
            $this -> validate($request,[
                //具体规则
                'username' => 'required|min:4|max:20',
                'passwd' => 'required|min:8|max:20'
            ]);
            //第二层验证 (账号密码匹配验证)
            $username = $request['username'];
            $passwd = $request['passwd'];
            $model = new User();//实例化模型
            $result = $model::where('username',$username)->where('passwd',sha1($passwd))->get();
            if(!$result || $result->count() == 0)//如果返回出错或者无返回记录
            {
                //保险
                if(Session::has('valid_user'))
                {
                    Session::forget('valid_user');
                }
                //输出信息，回到页面
                $title = 'Problem:';
                return view('fail_login',compact('title'));
            }
            else
            {
                //至此 验证成功 添加session变量
                Session::put('valid_user',$username);
                //进入菜单界面
                return redirect('/menu');
            }
        }

        else
        {
            //保险
            if(Session::has('valid_user'))
            {
                Session::forget('valid_user');
            }
            return view('login');
        }
    }


    //注册表单验证
    public function auth_register(Request $request)
    {
        if(Input::method() == 'POST')
        {
            //自动验证 (调用laravel表单验证)
            $this -> validate($request,[
                //具体规则
                'email' => 'email',
                'username' => 'required|min:4|max:20',
                'passwd' => 'required|min:8|max:20',
                'passwd2' => 'required|min:8|max:20|same:passwd',
            ]);
            $email = $request['email'];
            $username = $request['username'];
            $passwd = sha1($request['passwd']);//散列

            //检验是否已注册
            $model = new User();
            $result = $model::where('username',$username)->get() -> count();
            if($result != 0) //已被注册
            {
                $title = 'Problem:';
                return view('fail_register',compact('title'));
            }
            //通过验证 写进数据库
            $model -> username = $username;
            $model -> passwd = $passwd;
            $model -> email = $email;
            $model -> save();
            //注册成功 输出提示
            $title = 'Register sucessfully';
            return view('true_register',compact('title'));
        }
        else
        {
            return redirect('/register');
        }
    }

    //重置密码
    public function reset_passwd(Request $request)
    {
        //验证用户是否存在
        $model = new User();
        $result = $model::where('username',$request['username'])->get() -> count();
        if($result > 0)
        {
            //账户存在
            echo "ca";
        }
        else
        {
            //帐户不存在
            $title = '';
            return view('');
        }
    }
}