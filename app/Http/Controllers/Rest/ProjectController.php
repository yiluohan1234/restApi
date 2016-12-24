<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use App\Http\Model\Project;

class ProjectController extends Controller
{
    //get.rest/project 全部项目列表
    public function index()
    {
    	$data = (new Project)->tree();
    	return view('rest.project.index')->with('data', $data);
    }
    public function changeorder()
    {
        $input = Input::all();
        $project = Project::find($input['project_id']);
        $project->project_order = $input['project_order'];
        $ret = $project->update();
        if ($ret)
        {
            $data = [
                'status' => 0,
                'msg' => '项目排序更新成功',
            ];
        }
        else
        {
            $data = [
                'status' => 1,
                'msg' => '项目排序更新失败，请稍后重试',
            ];
        }
        return $data;
    }
    //post.rest/project/create 添加项目
    public function create()
    {
    	$data = Project::where('project_pid',0)->get();
    	return view('rest.project.add',compact('data'));
    }
    //post.rest/project 添加项目提交
	public function store()
    {  	       
    	$input = Input::except('_token');
    	$input['project_time'] = time();
        //dd($input);
        //验证的规则
        $rules = [
            'project_name'=>'required',
            'project_order'=>'required',
        ];
        //输出错误信息
        $message = [
            'project_name.required' => '分类名称不能为空',
            'project_order.required' => '分类排序不能为空',
            ];
        //输入，规则，自定义信息
        $validator = Validator::make($input,$rules,$message);
        if ($validator->passes())
        {
           $ret = Project::create($input);
           if ($ret)
           {
            	return redirect('rest/project');
           }
           else
           {
                return back()->with('errors','数据填充失败,请稍后重试');
           }
        }
        else
        {
            return back()->withErrors($validator);
        }
	}
	//get.rest/project/[user] 编辑单个项目信息
    public function edit($project_id)
    {
    	$field = Project::find($project_id);
        $data = Project::where('project_pid',0)->get();
        return view('rest.project.edit',compact('field','data'));
    }
    //put.rest/project/[user] 更新单个项目信息
    public function update($project_id)
    {
    	$input = Input::except('_token','_method');
        $ret = Project::where('project_id',$project_id)->update($input);
        if ($ret)
        {
            return redirect('rest/project');
        }
        else
        {
            return back()->with('errors','分类信息更新失败,请稍后重试');
        }

    }
    //get.rest/project/[user] 显示单个项目信息
    public function show()
    {

    }
    //delete.rest/project/[user] 删除单个项目信息
    public function destroy($project_id)
    {
    	$ret = Project::where('project_id',$project_id)->delete();
    	Project::where('project_pid',$project_id)->update(['project_pid'=>0]);
        if ($ret)
        {
            $data = [
                'status' =>0,
                'msg' => '项目删除成功',
            ];
        }
        else
        {
            $data = [
                'status' =>1,
                'msg' => '项目删除失败,请稍后重试',
            ];
        }
        return $data;
    }
}
