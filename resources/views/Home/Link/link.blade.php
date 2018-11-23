@extends("Home.Homepublic.public")
@section("home")
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

	<link type="text/css" rel="stylesheet" href="/static/home/jd/css/4b441311297949c9966dd3e33c99d62b.css" />
 	<script type="text/javascript" charset="utf-8">
		window.pageConfig={
			compatible:true
		};
		
	</script>

	<link type="text/css" rel="stylesheet" href="/static/home/jd/css/link.2012_1.css" />
	<script type="text/javascript" src="/static/home/jd/js/base.js"></script>
</head>
<body>

	<div class="w">
		<!-- ajax分页开头 -->
		<div id="uid">
		<div class="link_box">
			<div class="link_top"><div class="top_right"></div><div class="top_left"></div></div>	
			<div class="link_content">
				<h3 class="link_tit">友情链接</h3>
				<ul class="link_list">
					@foreach($data as $row)
						<li><a href="{{$row->url}}" target="_blank">{{$row->name}}</a></li>
					@endforeach
				</ul>
				<div class="Pagination">
						@foreach($pp as $row)
						<a href="javascript:void(0)" class="current" onclick="page({{$row}})">{{$row}}</a>
     					@endforeach
						
						<!-- <a class="next" href="//club.jd.com/links.action?page=2">下一页<b></b></a> -->
				</div>
			</div>
			<div class="link_bottom"><div class="bottom_right"></div><div class="bottom_left"></div></div>
		</div>
		</div>
		<!-- ajax分页结尾 -->
		<div class="link_box_a">
			<div class="link_top">
				<div class="top_right"></div>
				<div class="top_left"></div>
			</div>
			<div class="link_content">
				<h3 class="link_tit">申请友情链接</h3>
				<ul class="link_step">
					<li class="link_step_tit">申请步骤：</li>
					<li>
						<div class="float_Left">
							1.</div>
						<div class="margin_l_12">
							请先在贵网站做好淘食的文字友情链接：
							<br> 链接文字：淘食链接地址：
							<a href="//www.welaravel.com" target="_blank">www.welaravel.com</a></div>
					</li>
					<li>2.做好链接后，请在右侧填写申请信息。淘食只接受申请文字友情链接。</li>
					<li>
						<div class="float_Left"> 3.</div>
						<div class="margin_l_12">
							已经开通我站友情链接且内容健康，符合本站友情链接要求的网站，经淘食管理员审核后，可以显示在此友情链接页面。</div>
					</li>
					<li>
						<div class="float_Left"> 4.</div>
						<div class="margin_l_12">
							请通过右侧提交申请，注明：友情链接申请。</div>
					</li>
				</ul>
				<form id="frm_submit" action="/brands/create" method="get">
				<table cellpadding="0" cellspacing="0" class="link_table" width="309">
					<tbody><tr>
						<td height="29" colspan="2" valign="top" class="link_step_tit">
							申请信息</td>
					</tr>
					<tr>
						<td height="29">
							网站名称：
						</td>
						<td height="29">
							<input id="name" name="name" type="text" class="w247">
						</td>
					</tr>
					<tr>
						<td height="29">
							网&nbsp;&nbsp;&nbsp;&nbsp;址：
						</td>
						<td height="29">
							<input id="url" name="url" type="text" class="w247" value="http://">
						</td>
					</tr>
					<tr>
						<td height="35">
							电子邮箱：
						</td>
						<td height="29">
							<input id="email" name="email" type="text" class="w247">
						</td>
					</tr>
					<tr>
						<td height="45" colspan="2" align="center" valign="middle">
							<input type="submit" value="提交申请" id="btnSubmit" class="link_button">
						</td>
					</tr>
				</tbody></table>
				</form>
			</div>
			<div class="link_bottom">
				<div class="bottom_right"></div>
				<div class="bottom_left"></div>
			</div>
		</div>
	</div>

</body>
	<script>
	function page(page)
	{
	    //触发ajax
	    $.get('/link',{page:page},function(data){
		    //赋值
		    $('#uid').html(data);
		});
	}
	</script>
</html>
@endsection
@section('title','友情链接')