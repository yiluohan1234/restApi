@extends('layouts.rest')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('rest/welcome')}}">首页</a> &raquo; zhihui-接口列表
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('rest/zhihui/create')}}"><i class="fa fa-plus"></i>添加接口</a>
                    <a href="{{url('rest/zhihui')}}"><i class="fa fa-recycle"></i>接口列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>名称</th>
                        <th>作者</th>
                        <th>URL</th>
                        <th>wiki</th>
                        <th>redmine</th>
                        <th>更新时间</th>                        
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->api_id}}</td>
                        <td>{{$v->api_name}}</td>
                        <td>{{$v->api_editor}}</td>
                        <td>
                            <a href="{{$v->api_url}}" target="_black">url</a>
                        </td>
                        <td>
                            <a href="{{$v->api_wiki}}" target="_black">wiki</a>
                        </td>
                        <td>
                            <a href="{{$v->api_redmine}}" target="_black">redmine</a>
                        </td>
                        <td>{{date('Y-m-d',$v->api_time)}}</td>
                        <td>
                            <a href="{{url('rest/zhihui/'.$v->api_id).'/edit'}}">修改</a>
                            <a href="javascript:;" onclick="del({{$v->api_id}})">删除</a>
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
    
    //删除
    function del(api_id) {
        layer.confirm('您确定要删除这个接口吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('rest/zhihui/')}}/"+api_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }
                else
                {
                    layer.msg(data.msg, {icon: 5});
                }
            });
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
