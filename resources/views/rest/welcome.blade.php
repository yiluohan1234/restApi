@extends('layouts.rest')
@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('rest/welcome')}}">首页</a> &raquo; 欢迎
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
<!--     <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增项目</a>
                <a href="#"><i class="fa fa-recycle"></i>新增接口</a>
            </div>
        </div>
    </div> -->
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h2>欢迎</h2>
        </div>
        <div class="result_content">
		   <h1>欢迎来到QA后台管理系统!</h1>
			<p>问题or需求 可联系 崔羽飞(cuiyufei@taihe.com)</p> 
        </div>
    </div>
	<!--结果集列表组件 结束-->
@endsection
