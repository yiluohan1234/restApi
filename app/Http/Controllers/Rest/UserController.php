<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use App\Http\Model\User;

class UserController extends CommonController
{
	//get.rest/user 全部用户列表
    public function index()
    {
    	$data = User::orderby('user_id','asc')->paginate(6);
    	return view('rest.user.index')->with('data', $data);
    }
    
    //post.rest/user/create 添加用户
    public function create()
    {
    	return view('rest.user.add');
    }
    //post.rest/user 添加用户提交
	public function store()
    {  	
    	$input = Input::all();
    	//输入数据库的数据
    	$data = array(
    			'user_name' => Input::get('username'),
    			'user_password' => Crypt::encrypt(Input::get('password')),
    			'user_authority' => Input::get('authority'),
			);
    	
        //验证的规则
        $rules = [
        	'username' => 'required',
            'password' => 'required|between:6,20|confirmed',
        ];
        //输出错误信息
        $message = [
        	'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'password.between' => '密码必须在6-20位之间',
            'password.confirmed' =>'两次输入密码不一致',
            ];
        //输入，规则，自定义信息
        $validator = Validator::make($input,$rules,$message);

        if ($validator->passes())
        {
         	$ret = User::create($data);  
         	if ($ret)
         	{
         		return redirect('rest/user');
         	} 
         	else
         	{
         		return back()->with('errors','用户添加失败，请稍后重试');
         	}           
        }
        else
        {
            return back()->withErrors($validator);
        }
	}
	//get.rest/user/[user] 编辑单个用户信息
    public function edit($user_id)
    {
    	$field = User::find($user_id);
    	return view('rest.user.edit', compact('field'));
    }
    //put.rest/user/[user] 更新单个用户信息
    public function update($user_id)
    {
    	$input = Input::except('_token', '_method');
    	$ret = User::where('user_id', $user_id)->update($input);
    	if ($ret)
    	{
    		return redirect('rest/user');
    	}
    	else
    	{
    		return back()->with('errors','用户数据更新失败，请稍后重试');
    	}

    }
    //get.rest/user/[user] 显示单个用户信息
    public function show()
    {

    }
    //delete.rest/user/[user] 删除单个用户信息
    public function destroy($user_id)
    {
    	$ret = User::where('user_id',$user_id)->delete();
        if ($ret)
        {
            $data = [
                'status' =>0,
                'msg' => '分类删除成功',
            ];
        }
        else
        {
            $data = [
                'status' =>1,
                'msg' => '分类删除失败,请稍后重试',
            ];
        }
        return $data;
    }

   

}
