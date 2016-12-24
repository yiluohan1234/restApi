<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/rest/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/rest/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Rest</h1>
		<h2>欢迎使用API管理平台</h2>
		<div class="form">
			@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('/rest/code')}}" alt="" onclick="this.src='{{url('rest/code')}}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p>Coypright &copy; 2016 Powered by <a href="https://github.com/yiluohan1234/monitor" target="_blank">yiluohan1234</a></p>
		</div>
	</div>
</body>
</html>
