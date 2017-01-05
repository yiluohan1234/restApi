<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
	//后台index
    public function index()
    {   
        $project = Project::all();
    	return view('rest.index', compact('project'));
    }
	//系统基本信息
	public function info()
	{
		return view('rest.info');
	}
    //欢迎界面
    public function welcome()
    {
    	return view('rest.welcome');
    }
    //更改密码
     public function pass()
    {
        if ($input = Input::all())
        {
            //验证的规则
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            //输出错误信息
            $message = [
                'password.required' => '新密码不能为空',
                'password.between' => '新密码必须在6-20位之间',
                'password.confirmed' =>'两次输入密码不一致',
                ];
            //输入，规则，自定义信息
            $validator = Validator::make($input,$rules,$message);

            if ($validator->passes())
            {
                $user = User::first();
                $_password = Crypt::decrypt($user->user_password);
                //验证输入的密码
                if ($input['password_o'] == $_password)
                {
                    $user->user_password = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功');;
                }
                else
                {
                    return back()->with('errors','原密码错误');
                }
            }
            else
            {
                return back()->withErrors($validator);
            }
        }
        else
        {       
            return view('rest.pass');
        }
    }
}
  
