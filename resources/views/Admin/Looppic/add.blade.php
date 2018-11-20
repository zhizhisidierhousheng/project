<!doctype html>
<html>
  <head>    
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="Bookmark" href="/static/admin//favicon.ico" >
  <link rel="Shortcut Icon" href="/static/admin//favicon.ico" />
  <!--[if lt IE 9]>
  <script type="text/javascript" src="lib/html5shiv.js"></script>
  <script type="text/javascript" src="lib/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
  <link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
  <link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
  <link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
  <link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />

  </head>
  <body>
    <form action="/adminlooppic" method="post" enctype="multipart/form-data">
    图片描述：<input type="text" name="dcr" class="input-text Wdate">
    <br> 
    文件:<input type="file" name="pic" class="input-text Wdate">
    <br>        
    {{csrf_field()}}        
    <input type="submit" class="btn btn-success" value="提交">
    <a href="javascript:window.opener=null;window.open('','_self');window.close();">关闭</a>
    </form>
  </body>
</html>