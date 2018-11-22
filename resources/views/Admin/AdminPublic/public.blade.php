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

	<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />

	<link href="/static/admin/calendar/css/calendarAll.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/calendar/css/skin.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/calendar/css/calendar.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/static/admin/my.css" media="screen" />
	<!-- <script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>  -->
	<!-- <script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>  -->
	<title>@yield('title')</title>
</head>
<body>
@section('admin')
@show
</body>

<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 

<script>
     // 隐藏报错信息
    $('.div').click(function(){
        $(this).hide();
    });
</script>
</html>