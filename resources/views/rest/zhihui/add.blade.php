@extends('layouts.rest')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('rest/welcome')}}">首页</a> &raquo; zhihui-添加接口
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
                <a href="{{url('rest/zhihui/create')}}"><i class="fa fa-plus"></i>添加接口</a>
                <a href="{{url('rest/zhihui')}}"><i class="fa fa-recycle"></i>接口列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('rest/zhihui')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="api_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>接口作者：</th>
                        <td>
                            <input type="text" name="api_editor">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>                    
                    <tr>
                        <th><i class="require">*</i>URL：</th>
                        <td>
                            <textarea name="api_url"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>redmine：</th>
                        <td>
                            <input type="text" class="lg" name="api_redmine">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>wiki：</th>
                        <td>
                            <input type="text" class="lg" name="api_wiki">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="api_description"></textarea>
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
