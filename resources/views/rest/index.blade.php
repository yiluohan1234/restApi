@extends('layouts.rest')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">QA后台管理</div>
		</div>
		<div class="top_right">
			<ul>
				<li>用户：cuiyufei</li>
				<li><a href="{{url('rest/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('rest/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>		
			@foreach($project as $v)
			@if ($v->project_pid == 0)
            <li>            	
	        	<h3><i class="fa fa-fw fa-clipboard"></i>{{$v->project_name}}</h3>	        	
	            <ul class="sub_menu">
	            @foreach($project as $m)	
	            @if($m->project_pid == $v->project_id)	                    
	                <li><a href="{{url($m->project_url)}}" target="main"><i class="fa fa-fw fa-list-ul"></i>{{$m->project_name}}</a></li>			                    
	            @endif
	            @endforeach
	            </ul>	            
	        @endif 	        
            </li>
            @endforeach
			@if(0 == 0)
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">               	
                    <li><a href="{{url('rest/user')}}" target="main"><i class="fa fa-fw fa-cubes"></i>用户配置</a></li>
                    <li><a href="{{url('rest/project')}}" target="main"><i class="fa fa-fw fa-book"></i>导航管理</a></li>
                    <li><a href="{{url('rest/info')}}" target="main"><i class="fa fa-fw fa-rebel"></i>系统基本信息</a></li>
                    
                    <!-- <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li> -->
                </ul>
            </li>
			@endif
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="https://laravel.com/docs/5.3" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('rest/welcome')}}" frameborder="0" width="100%" height="100%" name="main"></iframe> 
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		Copyright © 2016. Powered By <a href="https://github.com/yiluohan1234/monitor">yiluohan1234</a>.
	</div>
	<!--底部 结束-->
@endsection
