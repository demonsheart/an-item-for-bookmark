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
            //自动验证 (调用laravel封装的规则)
            $this -> validate($request,[
                //具体规则
                'username' => 'required|min:2|max:20',
                'passwd' => 'required|min:8'
            ]);
            //第二层验证 (账号密码匹配验证)
            $username = $request['username'];
            $passwd = $request['passwd'];
            $model = new User();//实例化模型
            $result = $model::where('username',$username)->where('passwd',sha1($passwd))->get();
            if(!$result || $result->count() == 0)//如果返回出错或者无返回记录
            {
                //输出信息，回到页面
                echo "deny";
            }
            else
            {
                //至此 验证成功
                Session::put('valid_user',$username);
                //进入菜单界面
                echo "sucessful";
            }
        }

        else
        {
            return view('login');
        }
    }
}