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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接管理 <span class="c-gray en">&gt;</span> 链接管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<!--   <div class="text-c"> 日期范围：
    <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
    -
    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
    <input type="text" class="input-text" style="width:250px" placeholder="输入友情链接名称" id="" name="">
    <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
  </div> -->
  <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius" id="alldel"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a></span> <span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
  <div id="uid">
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="9">员工列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
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
        <td><input type="checkbox" value="1" name="" id="checkbox"></td>
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
          @else
          &#xe615;
          @endif
          </i></a>
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
<!--_footer 作为公共模版分离出去-->
 <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script>
  /*全选删除*/
alert($('#checkbox').next().val());


// click(function(){
//   //让我们所有input框里面都被选中 在input里面添加checked=true的内容
//   $(':checkbox').attr('checked','true');
// }).next().click(function(){
//   //alert('反选');
//   //$('checkbox').attr('checked','false');
//   //获取到当前的某个对象之后进行判断是否为选中 如果选中则修改相反内容
//   $(':checkbox').each(function(){
//     //alert($(this).attr('checked'));
//     //将你选中的内容checked 改为相反内容
//     $(this).attr('checked',!$(this).attr('checked'));
//   })
// }).next().click(function(){
//   //alert('删除')
//   //remove() 删除元素
//   //parent() 获取父级元素
//   $(':checked').parent().remove();
// })
</script>
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
  }else{
    
  }

  // window.location.href = "/adminrelink/create";
  // {{method_field('DELETE')}}
  
}
// function admin_del(obj,id){
//   layer.confirm('确认要删除吗？',function(index){
//     $.ajax({
//       type: 'POST',
//       url: '',
//       dataType: 'json',
//       success: function(data){
//         $(obj).parents("tr").remove();
//         layer.msg('已删除!',{icon:1,time:1000});
//       },
//       error:function(data) {
//         console.log(data.msg);
//       },
//     });   
//   });
// }

/*友情链接-编辑*/
// function admin_edit(title,url,id,w,h){
//   layer_show(title,url,w,h);
// }
/*友情链接-停用*/
function admin_stop(obj,id)
{
  if(confirm('确定要停用吗？')){
    // alert(id);
     window.location.href = "/adminrelink/"+id+"/edit";
     alert(1111);
    @foreach($data as $r)
    $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,{{$r->id}})" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
    @endforeach
    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
    $(obj).remove();
   
    // confirm('删除成功');
  }else{
  }
}
// function admin_stop(obj,id){
//   layer.confirm('确认要停用吗？',function(index){
//     //此处请求后台程序，下方是成功后的前台处理……
    
//     $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
//     $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
//     $(obj).remove();
//     layer.msg('已停用!',{icon: 5,time:1000});
//   });
// }

/*友情链接-启用*/
function admin_stop(obj,id)
{
  @foreach($data as $r)
  {{$r->status}}
  @endforeach
  if(confirm('确定要启用吗？')){
    // alert(id);
     window.location.href = "/adminrelink/"+id+"/edit";
    
    $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,{{$r->id}})" href="javascript:;" title="禁用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
    
    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
    $(obj).remove();
   
    // confirm('删除成功');
  }else{

  }
}
// function admin_start(obj,id){
//   layer.confirm('确认要启用吗？',function(index){
//     //此处请求后台程序，下方是成功后的前台处理……
    
    
//     $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
//     $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
//     $(obj).remove();
//     layer.msg('已启用!', {icon: 6,time:1000});
//   });
// }
</script>
</body>
</html>
@endsection
<!-- 这是网页大标题 -->
@section('title','轮播图')
<!-- 这是下面小窗口标题 -->
@section('smalltitle','轮播图管理')