@extends('layouts.rest')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('rest/welcome')}}">首页</a> &raquo; 用户列表
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('rest/user/create')}}"><i class="fa fa-plus"></i>添加用户</a>
                    <a href="#"><i class="fa fa-recycle"></i>用户列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>用户名</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td>
                            <a href="#">{{$v->user_name}}</a>
                        </td>
                        <td>
                        @if($v->user_authority ==0 )
                            管理员
                        @else
                            普通用户
                        @endif
                        </td>
                        <td>
                            <a href="{{url('rest/user/'.$v->user_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delUser({{$v->user_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    <ul>
                        {{$data->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script>
        function delUser(user_id) {
            layer.confirm('您确定要删除这个用户吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('rest/user/')}}/"+user_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if(data.status==0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }
                    else
                    {
                        layer.msg(data.msg, {icon: 5});
                    }
                });
              //layer.msg('的确很重要', {icon: 1});
            }, function(){
              
            });
    }
</script>
<style>
    .result_content ul li span{
        font_size: 15px;
        padding:6px 12px;
    }
</style>
@endsection
