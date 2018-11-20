<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/static/admin/favicon.ico" >
<link rel="Shortcut Icon" href="/static/admin/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/static/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/static/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<title></title>
</head>
<body>
  <nav class="breadcrumb">
   <i class="Hui-iconfont"></i> 首页 
   <span class="c-gray en">&gt;</span> 广告管理 
   <span class="c-gray en">&gt;</span> 广告列表 
   <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
  </nav> 
  <div class="pd-20"> 
   <div class="text-c">
    <form action="/admin/adv" method="get">
    <input type="text" class="input-text" style="width:150px" placeholder="输入ID" name="id" value="{{$request['id'] or ''}}" />
    <input type="text" class="input-text" style="width:150px" placeholder="输入标题" name="title" value="{{$request['title'] or ''}}" />
    <input type="text" class="input-text" style="width:150px" placeholder="输入描述" name="dcr" value="{{$request['dcr'] or ''}}" />
    <input type="text" class="input-text" style="width:150px" placeholder="输入URL" name="url" value="{{$request['url'] or ''}}" />
    <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button> 
    </form>
   </div> 
   <div class="cl bg-1 bk-gray mt-20"> 
   </div>
   @if(count($advs) > 0)
   <form action="/admin/adv/batchdel" method="post" id="batchdel">
   <table class="table table-border table-bordered table-hover table-bg table-sort"> 
    <thead> 
     <tr class="text-c">
      <th>选择</th>
      <th>ID</th> 
      <th>图片</th> 
      <th>标题</th>
      <th>描述</th> 
      <th>URL</th> 
      <th>状态</th>
      <th>操作</th>
     </tr> 
    </thead> 
    <tbody>
     @foreach($advs as $adv)

     <tr class="text-c"> 
      <td><input type="checkbox" name="advs[]" value="{{$adv->id}}"></td> 
      <td>{{$adv->id}}</td> 
      <td><img src="{{$adv->pic}}" width="50" height="50"></td> 
      <td>{{$adv->title}}</td>
      <td class="text-l">{{$adv->dcr}}</td> 
      <td class="text-l">{{$adv->url}}</td>
      <td>
        @if($adv->status == 0)
        <span class="label radius">隐藏</span>
        @else
        <span class="label label-success radius">显示</span>
        @endif
      </td>
      <td>
        @if($adv->status == 0)
        <a title="显示" href="javascript:;" style="text-decoration:none" onclick="status(this, 1)"><i class="Hui-iconfont">&#xe6dc;</i></a>
        @else
        <a title="隐藏" href="javascript:;" style="text-decoration:none" onclick="status(this, 0)"><i class="Hui-iconfont">&#xe6de;</i></a>
        @endif
        &nbsp;
        <a title="编辑" href="javascript:;" onclick="creatIframe('/admin/adv/{{$adv->id}}/edit', '广告修改')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
        <form action="/admin/adv/{{$adv->id}}" method="post" style="display:inline;" id="adv_del">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <a title="删除" href="javascript:document.getElementById('adv_del').submit();" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
        </form>
      </td>
     </tr>
     @endforeach
    </tbody> 
   </table>
   </form>
   <div class="cl pd-5 bg-1 bk-gray"> 
    <span><a href="javascript:document.getElementById('batchdel').submit();" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a></span>
    <span><a class="btn btn-primary radius" href="javascript:;" id="checkall">全选</a></span>
    <span><a class="btn btn-primary radius" href="javascript:;" id="reverse">反选</a></span>
   </div>
   <div id="pageNav" class="pageNav"></div>
   @endif
  </div> 
</body>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
  $('#checkall').click(function(){
      $('input[type=checkbox]').prop('checked', 'true');
  });
  $('#reverse').click(function(){
      $('input[type=checkbox]').each(function(){
          $(this).prop('checked', !$(this).prop('checked'));
      });
  });
  function status(obj, status)
  {
      id = $(obj).parents('tr').find('td:first').next().html();
      span = $(obj).parents('tr').find('td:last').prev();
      $.get('/admin/advstatus', {id:id, status:status}, function(data) {
          if (status == 1) {
              if (data.msg == 1) {
                  span.html('<span class="label label-success radius">显示</span>');
                  $(obj).attr('title', '隐藏');
                  $(obj).attr('onclick', 'status(this, 0)');
                  $(obj).html('<i class="Hui-iconfont">&#xe6de;</i>');
              } else {
                  alert('修改失败');
              }
          } else {
              if (data.msg == 1) {
                  span.html('<span class="label radius">隐藏</span>');
                  $(obj).attr('title', '显示');
                  $(obj).attr('onclick', 'status(this, 1)');
                  $(obj).html('<i class="Hui-iconfont">&#xe6dc;</i>');
              } else {
                  alert('修改失败');
              }
          }
      }, 'json');
  }
  </script>
</html>