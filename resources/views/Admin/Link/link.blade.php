@extends("Admin.AdminPublic.public")
@section("admin")
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript">
		window.pageConfig={
			compatible:true
		};
</script>
<link type="text/css" rel="stylesheet" href="/static/home/jd/css/link.2012_1.css" />
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
</head>
<!-- 假如数据库没有数据 -->
@if ($count == 0)
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接管理 <span class="c-gray en">&gt;</span> 链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div id="uid">
		<div class="link_box">
			<div class="link_top"><div class="top_right"></div><div class="top_left"></div></div>	
			<div class="link_content">
				<h3 class="link_tit">友情链接(已上架)</h3>
				<ul class="link_list">
					<h1>此处暂时没有数据 请去添加</h1>
				</ul>
				<div class="Pagination">
				</div>
			</div>
			<div class="link_bottom"><div class="bottom_right"></div><div class="bottom_left"></div></div>
		</div>
		</div>
@else
     <body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接管理 <span class="c-gray en">&gt;</span> 链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="w">
		<!-- 这里取出ajax分页内容 -->
		<div id="uid">
		<div class="link_box">
			<div class="link_top"><div class="top_right"></div><div class="top_left"></div></div>	
			<div class="link_content">
				<h3 class="link_tit">友情链接(已上架)</h3>
				<ul class="link_list">
					@foreach($data as $row)
					
						<li><a href="{{$row->url}}" target="_blank">{{$row->name}}</a></li>
					
					@endforeach
				</ul>
				<div class="Pagination">
				</div>
			</div>
			<div class="link_bottom"><div class="bottom_right"></div><div class="bottom_left"></div></div>
		</div>
		</div>
		<!-- 结束ajax -->
		<div class="link_box_a">
			<div class="link_top">
				<div class="top_right"></div>
				<div class="top_left"></div>
			</div>
				<div class="link_bottom">
				<div class="bottom_right"></div>
				<div class="bottom_left"></div>
			</div>
		</div>
	</div>   
	<!-- 分页按钮 -->     
    <div style="float:right;margin-right:50px">
	    @foreach($pp as $row)
	    	<a href="javascript:void(0)" class="btn btn-success" style="float:left;margin-left:7px" onclick="page({{$row}})">{{$row}}</a>
	    @endforeach
    </div>
@endif
<!-- js -->
<script type="text/javascript">
	//分页
	function page(page)
	{
	    //触发ajax
	    $.get('/adminlink',{page:page},function(data){
		    // alert(data);
		    //赋值
		    $('#uid').html(data);
	    })
	}
</script>
</body>
</html>
@endsection
<!-- 这是网页大标题 -->
@section('title','友情链接')
<!-- 这是下面小窗口标题 -->
@section('smalltitle','链接列表')