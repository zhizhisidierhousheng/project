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
   <span class="c-gray en">&gt;</span> 公告管理 
   <span class="c-gray en">&gt;</span> 公告列表 
   <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
  </nav> 
  <div class="pd-20"> 
   <div class="text-c">
    <form action="/admin/notice" method="get">
    <input type="text" class="input-text" style="width:150px" placeholder="输入标题" name="title" value="{{$request['title'] or ''}}" />
    <input type="text" class="input-text" style="width:150px" placeholder="输入内容" name="content" value="{{$request['content'] or ''}}" />
    <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button> 
    </form>
   </div> 
   <div class="cl bg-1 bk-gray mt-20"> 
   </div>
   @if(count($data) > 0)
   <form action="/admin/notice/batchdel" method="post" id="batchdel">
   <table class="table table-border table-bordered table-hover table-bg table-sort"> 
    <thead> 
     <tr class="text-c">
      <th>选择</th>
      <th>ID</th> 
      <th>标题</th>
      <th>内容</th> 
      <th>操作</th>
     </tr> 
    </thead> 
    <tbody>
     @foreach($data as $row)

     <tr class="text-c"> 
      <td><input type="checkbox" name="notices[]" value="{{$row->id}}"></td> 
      <td>{{$row->id}}</td> 
      <td class="text-l">{{$row->title}}</td>
      <td class="text-l">{{$row->content}}</td> 
      <td>
        <form action="/admin/notice/{{$row->id}}" method="post" style="display:inline;" id="notice_del">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <a title="删除" href="javascript:document.getElementById('notice_del').submit();" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
  $('#checkall').click(function(){
      $('input[type=checkbox]').prop('checked', 'true');
  });
  $('#reverse').click(function(){
      $('input[type=checkbox]').each(function(){
          $(this).prop('checked', !$(this).prop('checked'));
      });
  });
  </script>
</html>