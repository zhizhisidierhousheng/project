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
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<!-- 结束 -->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>友情链接列表</title>
</head>
<body>
<nav class="breadcrumb">
  <i class="Hui-iconfont">&#xe67f;</i>首页
  <span class="c-gray en">&gt;</span>友情链接管理
  <span class="c-gray en">&gt;</span> 链接管理 
  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
    <i class="Hui-iconfont">&#xe68f;</i>
  </a>
</nav>
@if ($count == 0)
<div class="page-container">
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <!-- 全选反选删除 -->
    <div style="float:left;">
     <a class="btn btn-success allchoose" style="float:left;margin-left:7px">全选</a>
     <a class="btn btn-success fchoose" style="float:left;margin-left:7px">反选</a>
     <a class="btn btn-danger delchoose" style="float:left;margin-left:7px" onclick="">删除选中</a>
    </div>
    <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
  <div id="uid">
  <table class="table table-border table-bordered table-bg relinktable">
    <thead>
      <tr>
        <th scope="col" colspan="9">员工列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"></th>
        <th width="40">ID</th>
        <th width="150">网站名称</th>
        <th width="250">邮箱</th>
        <th>友情链接URL</th>
        <th width="100">是否已启用</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-c">
        <td colspan="7">暂无数据 请添加</td>
      </tr>      
    </tbody>
  </table>
  </div>

</div>
@else
<div class="page-container">
<!--   <div class="text-c"> 日期范围：
    <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
    -
    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
    <input type="text" class="input-text" style="width:250px" placeholder="输入友情链接名称" id="" name="">
    <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
  </div> -->
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <!-- 全选反选删除 -->
    <div style="float:left;">
     <a class="btn btn-success allchoose" style="float:left;margin-left:7px">全选</a>
     <a class="btn btn-success fchoose" style="float:left;margin-left:7px">反选</a>
     <a class="btn btn-danger delchoose" style="float:left;margin-left:7px" onclick="">删除选中</a>
    </div>
    <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
  <div id="uid">
  <table class="table table-border table-bordered table-bg relinktable">
    <thead>
      <tr>
        <th scope="col" colspan="9">员工列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"></th>
        <th width="40">ID</th>
        <th width="150">网站名称</th>
        <th width="250">邮箱</th>
        <th>友情链接URL</th>
        <th width="100">是否已启用</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row1)
      <tr class="text-c">
        <td><input type="checkbox" value="{{$row1->id}}" name=""></td>
        <td>{{$row1->id}}</td>
        <td>{{$row1->name}}</td>
        <td>{{$row1->email}}</td>
        <td>{{$row1->url}}</td>
        <td class="td-status">
          @if($row1->status == 0)
          <span class="label label-warning radius">
           已禁用
           </span>
          @else
          <span class="label label-success radius">
           已启用
           </span> 
          @endif
        </td>
        <td class="">
          <a style="text-decoration:none" onClick="admin_stop(this,{{$row1->id}})" href="javascript:;" >
          <i class="Hui-iconfont">
            @if($row1->status == 0)
              &#xe631;
              <span class="hidden">{{$row1->status}}</span>
            @else
              &#xe615;
              <span class="hidden">{{$row1->status}}</span>
            @endif
            </i>
          </a>
          <a onclick="admin_del(this,{{$row1->id}})" class="ml-5" style="text-decoration:none">
        
          <i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
<!--_footer 作为公共模版分离出去-->
 <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
/*
  参数解释：
  title 标题
  url   请求的url
  id    需要操作的数据id
  w   弹出层宽度（缺省调默认值）
  h   弹出层高度（缺省调默认值）
*/
/*友情链接-增加*/
// function admin_add(title,url,w,h){
//   layer_show(title,url,w,h);
// }

//全选
$('.allchoose').click(function(){
  $(".relinktable").find('tr').each(function(){
    $(this).find(':checkbox').prop('checked',true);
    // alert($(this).find(':checkbox').prop('checked'));
  })

});
//反选
$('.fchoose').click(function(){

  $(".relinktable").find('tr').each(function(){
    if($(this).find(':checkbox').prop('checked')){
      $(this).find(':checkbox').prop("checked",false);
    }else{
      $(this).find(':checkbox').prop('checked',true);
    }
  })

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
  // alert(arr);
  
  //ajax
  $.get('/relinkchoosedel',{arr:arr},function(data){
    // alert(data);
    if(data == 1){
      // alert('删除成功');
      
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
  // alert(page);
  
  //触发ajax
  $.get('/adminrelink',{page:page},function(data){
    // alert(data);
    //赋值
    $('#uid').html(data);
    
  })
}

/*友情链接-删除*/
function admin_del(obj,id)
{
   
  
  if(confirm('确定删除？')){
    // alert(id);
    window.location.href = "/adminrelink/"+id;
    confirm('删除成功');
  }
}
function admin_stop(obj,id)
{
  // alert($('.hidden').html());
  if($('.hidden').html()==1){
    if(confirm('确定要停用吗？')){
      // alert(id);
       window.location.href = "/adminrelink/"+id+"/edit";
      // confirm('删除成功');
    }
  }else{
    if(confirm('确定要启用吗？')){
      // alert(id);
       window.location.href = "/adminrelink/"+id+"/edit";
      // confirm('删除成功');
    }
  }
}
</script>
</body>
</html>
@endsection
<!-- 这是网页大标题 -->
@section('title','友情链接')
<!-- 这是下面小窗口标题 -->
@section('smalltitle','链接管理')