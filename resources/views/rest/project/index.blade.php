@extends('layouts.rest')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('rest/info')}}">首页</a> &raquo; 项目管理
    </div>
    <!--面包屑导航 结束-->

	<!-- 结果页快捷搜索框 开始
    <div class="search_wrap">
            <form action="" method="post">
                <table class="search_tab">
                    <tr>
                        <th width="120">选择分类:</th>
                        <td>
                            <select onchange="javascript:location.href=this.value;">
                                <option value="">全部</option>
                                <option value="http://www.baidu.com">百度</option>
                                <option value="http://www.sina.com">新浪</option>
                            </select>
                        </td>
                        <th width="70">关键字:</th>
                        <td><input type="text" name="keywords" placeholder="关键字"></td>
                        <td><input type="submit" name="sub" value="查询"></td>
                    </tr>
                </table>
            </form>
        </div>
        结果页快捷搜索框 结束 -->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('rest/project/create')}}"><i class="fa fa-plus"></i>添加项目</a>
                    <a href="{{url('rest/project')}}"><i class="fa fa-recycle"></i>项目列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>项目名称</th>
                        <th>项目描述</th>
                        <th>发布人</th>
                        <th>创建时间</th>
                        <th>项目链接地址</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$v->project_id}})" value="{{$v->project_order}}">
                        </td>
                        <td class="tc">{{$v->project_id}}</td>
                        <td>
                            <a href="#">{{$v->_project_name}}</a>
                        </td>
                        <td>{{$v->project_description}}</td>
                        <td>{{$v->project_editor}}</td>
                        <td>{{date('Y-m-d',$v->project_time)}}</td>
                        <td>{{$v->project_url}}</td>
                        <td>
                            <a href="{{url('rest/project/'.$v->project_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delProject({{$v->project_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach    
                </table>
                <!--分页start--
                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                --分页end-->
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,project_id){
        var project_order = $(obj).val();
        $.post("{{url('rest/project/changeorder')}}",{'_token':'{{csrf_token()}}','project_id':project_id,'project_order':project_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }           
        });
    }
    //删除分类
    function delProject(project_id) {
        layer.confirm('您确定要删除这个项目吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('rest/project/')}}/"+project_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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