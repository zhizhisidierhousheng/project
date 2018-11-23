@extends("Admin.AdminPublic.public")
@section('admin')
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 

<title>轮播图列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 轮播图管理 <span class="c-gray en">&gt;</span> 链接管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div style="float:left;">

     <a class="btn btn-success allchoose" style="float:left;margin-left:7px">全选</a>
     <a class="btn btn-success fchoose" style="float:left;margin-left:7px">反选</a>
     <a class="btn btn-danger delchoose" style="float:left;margin-left:7px" onclick="">删除选中</a>
    </div>
    <span class="r">共有数据：<strong>{{$count}}</strong> 条</span>
@if ($count == 0)
    <!-- 全选反选删除 -->
    </div>
    <div id="uid">
        <table class="table table-border table-bordered table-bg looppictable">
            <thead>
                <tr>
                    <th scope="col" colspan="9">轮播图列表</th>     
                </tr>
                <tr class="text-c">
                    <th width="25"></th>
                    <th width="40">ID</th>
                    <th width="150">图片描述</th>
                    <th width="250">图片</th>
                    <th width="100">是否已启用</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-c">
                    <td colspan="6">暂无数据 请添加</td>
                </tr>    
            </tbody>
        </table>
    </div>

</div>
@else
</div>
    <div id="uid">
        <table class="table table-border table-bordered table-bg looppictable">
        <thead>
            <tr>
                <th scope="col" colspan="9">轮播图列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"></th>
                <th width="40">ID</th>
                <th width="150">图片描述</th>
                <th width="250">图片</th>
                <th width="100">是否已启用</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row1)
            <tr class="text-c">
                <td>
                    <input type="checkbox" value="{{$row1->id}}" name="" id="checkbox">
                </td>
                <td>{{$row1->id}}</td>
                <td>{{$row1->dcr}}</td>
                <td><img src="{{$row1->url}}" alt=""></td>
                <td class="td-status">
                    @if($row1->status == 0)
                        <span class="label label-warning radius">
                        已禁用
                        </span>
                    @else
                        <span class="label label-success radius" >
                        已启用
                        </span> 
                    @endif
                </td>
                <td class="">
                    <a style="text-decoration:none" onClick="picture_edit(this,{{$row1->id}})" href="javascript:;" >
                        <i class="Hui-iconfont Hui-iconfont-1">
                            @if($row1->status == 0)
                            &#xe631;
                            <span class="hidden">{{$row1->status}}</span>
                            @else
                            &#xe615;
                            <span class="hidden">{{$row1->status}}</span>
                            @endif
                        </i>
                    </a>
                    <a onclick="picture_del(this,{{$row1->id}})" class="ml-5" style="text-decoration:none">      
                        <i class="Hui-iconfont">&#xe6e2;</i>
                    </a>       
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
<!-- 分页按钮 -->     
    <div style="float:right;margin-right:50px">
    @foreach($pp as $row)
        <a href="javascript:void(0)" class="btn btn-success" style="float:left;margin-left:7px" onclick="page({{$row}})">{{$row}}</a>
    @endforeach
    </div>
@endif

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">

/*****全选反选删除*****/
//全选
$('.allchoose').click(function(){
    $(".looppictable").find('tr').each(function(){
        $(this).find(':checkbox').prop('checked',true);
        // alert($(this).find(':checkbox').prop('checked'));
    });
});
//反选
$('.fchoose').click(function(){

    $(".looppictable").find('tr').each(function(){
        if($(this).find(':checkbox').prop('checked')){
            $(this).find(':checkbox').prop("checked",false);
        }else{
            $(this).find(':checkbox').prop('checked',true);
        }
    });
});
// 删除选中
$('.delchoose').click(function(){
    arr = [];
    $(':checkbox').each(function(){
        if($(this).prop('checked')){
            id = $(this).val();
            arr.push(id);
        }
    });
    //ajax
    $.get('/looppicchoosedel',{arr:arr},function(data){
        // alert(data);
        if(data == 1){
            for (var i = 0;i < arr.length;i++){
                $('input[value="'+arr[i]+'"]').parents('tr').remove();
            }
        }else{
            alert(data);
        }
    });
});

/*分页*/
function page(page)
{
    //触发ajax
    $.get('/adminlooppic',{page:page},function(data){
        // alert(data);
        //赋值
        $('#uid').html(data);
    });
}
/*轮播图-删除*/
function picture_del(obj,id)
{
    if(confirm('确定删除？')){
        // alert(id);
        window.location.href = "/adminlooppic/"+id;
        confirm('删除成功');
    }
}
/*轮播图-改变状态*/
function picture_edit(obj,id)
{
    if($('.hidden').html() == 1){
        window.location.href = "/adminlooppic/"+id+"/edit";
    }else{
        window.location.href = "/adminlooppic/"+id+"/edit";
    }
}
</script>
</body>
</html>
@endsection
<!-- 这是网页大标题 -->
@section('title','轮播图管理')
<!-- 这是下面小窗口标题 -->
@section('smalltitle','轮播图管理')