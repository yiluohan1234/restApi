<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use App\Http\Model\Zt;

class ZtController extends Controller
{
    //get.rest/zt 全部接口列表
    public function index()
    {
    	$data = Zt::orderby('api_id','asc')->paginate(6);
    	return view('rest.zt.index')->with('data', $data);
    }
    
    //post.rest/zt/create 添加接口
    public function create()
    {
    	return view('rest.zt.add');
    }
    //post.rest/zt 添加接口提交
	public function store()
    {  	
    	$input = Input::except('_token');
    	$input['api_time'] = time();
    	
        $rules = [
        	'api_name' => 'required',
            'api_editor' => 'required',
            'api_url' => 'required',
            'api_redmine' => 'required',
            'api_wiki' => 'required',
        ];
        //输出错误信息
        $message = [
        	'api_name.required' => '接口名称不能为空',
            'api_editor.required' => '接口作者不能为空',
            'api_url.required' => '接口url不能为空',
            'api_redmine.required' =>'接口redmine不能为空',
            'api_wiki.required' => '接口wiki不能为空',
            ];
        //输入，规则，自定义信息
        $validator = Validator::make($input,$rules,$message);

        if ($validator->passes())
        {
         	$ret = Zt::create($input);  
         	if ($ret)
         	{
         		return redirect('rest/zt');
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
	//get.rest/zt/[user] 编辑单个接口信息
    public function edit($api_id)
    {
    	$data = Zt::find($api_id);
    	return view('rest.zt.edit', compact('data'));
    }
    //put.rest/zt/[user] 更新单个用户信息
    public function update($api_id)
    {
    	$input = Input::except('_token', '_method');
    	$ret = Zt::where('api_id', $api_id)->update($input);
    	if ($ret)
    	{
    		return redirect('rest/zt');
    	}
    	else
    	{
    		return back()->with('errors','用户数据更新失败，请稍后重试');
    	}

    }
    //get.rest/zt/[user] 显示单个用户信息
    public function show()
    {

    }
    //delete.rest/zt/[user] 删除单个用户信息
    public function destroy($api_id)
    {
    	$ret = Zt::where('api_id',$api_id)->delete();
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
