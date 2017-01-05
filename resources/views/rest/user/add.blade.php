@extends('layouts.rest')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('rest/welcome')}}">首页</a> &raquo; 添加用户
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
            <div class="mark">  
                @if(is_object($errors))                       
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('rest/user/create')}}"><i class="fa fa-plus"></i>添加用户</a>
                <a href="{{url('rest/user')}}"><i class="fa fa-recycle"></i>用户列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('rest/user')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>用户名：</th>
                        <td>
                            <input type="text" name="username">
                            <span><i class="fa fa-exclamation-circle yellow"></i>默认为姓名</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>密码：</th>
                        <td>
                            <input type="password" name="password"> </i>密码6-20位</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>确认密码：</th>
                        <td>
                            <input type="password" name="password_confirmation"> </i>再次输入密码</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>用户权限：</th>
                        <td>
                            <label for=""><input type="radio" name="authority" value="0">管理员</label>
                            <label for=""><input type="radio" name="authority" value="1" checked>普通用户</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection
