<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Model\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Redirect;
require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
    	if ($input = Input::all())
    	{
    		//判断验证码正确与否
    		$code = new \Code;
    		$_code = $code->get();
    		if (strtoupper($input['code']) != $_code)
    		{
    			return back()->with('msg', '验证码错误');
    		}

			//读取数据库的用户信息,没有做权限处理
    		$user = User::where('user_name', Input::get('user_name'))->get();
            $data = array(
                'user_name' => $user[0]->user_name,
                'user_authority' => $user[0]->user_authority,
                );
                
    		if ($user[0]->user_name != $input['user_name'] || Crypt::decrypt($user[0]->user_password) != $input['user_password'])
    		{
    			return back()->with('msg', '用户名或密码错误');
    		}
			/*//读取数据库的第一个用户
            $user = User::first();              
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_password) != $input['user_password'])
            {
                return back()->with('msg', '用户名或密码错误');
			}*/
    		session(['user' => $user]);
            return redirect('rest/index')->with('data',$data);
    	}
    	else
    	{
    		return view('rest.login');
    	}
    	
    }
    //生成验证码
    public function code()
    {
    	$code = new \Code;
    	$code->make();
    }
    //
    public function quit()
    {
        session(['user' => null]);
        return redirect('rest');
    }
}

