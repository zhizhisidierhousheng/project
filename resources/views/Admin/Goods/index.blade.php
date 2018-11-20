﻿@extends("Admin.AdminPublic.public")
@section("admin")

<style>
	.div{margin: 30px auto; width: 20%; text-align: center;border-radius: 10px; background: lightgreen;}
</style>
<title>商品列表</title>

<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="div" style="background:red;">
		@if(session('error'))
		    <font size="5" color="white">{{session('error')}}</font>
		@endif
		</div>
		<div class="div">
		    @if(session('success'))
		   	<font size="5" color="white">{{session('success')}}</font>
		    @endif
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th>ID</th>
						<th>商品名</th>
						<th>类别名</th>
						<th>单价</th>
						<th>描述</th>
						<th>图片</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($goods as $row)
					<tr class="text-c va-m">
						<td>{{$row->sid}}</td>
			       		<td>{{$row->sname}}</td>
			       		<td>{{$row->cname}}</td>
			       		<td>{{$row->price}}</td>
			       		<td>{!!$row->dcr!!}</td>
			       		<td><img src="{{$row->pic}}" width="100px" height="100px"></td>
			       		<td>{{$row->status}}</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5"  href="/admingoods/{{$row->id}}/edit" title="修改">
								<i class="Hui-iconfont">&#xe6df;</i>
							</a> 
							<a style="text-decoration:none" class="ml-5 del"  href="javascript:;" title="删除">
								<i class="Hui-iconfont">&#xe6e2;</i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div id="pages">
				{!!$goods->render()!!}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.js"></script>
<script>
	// 获取删除按钮 删除商品
    $('.del').click(function() {
    	if (confirm('确认删除吗')) {
    		id = $(this).parents('tr').find('td:first').html();
	        // 获取删除数据所在的tr
	        tr = $(this).parents('tr');
	        //  Ajax
	        $.get('/admingoodsdel', {id:id}, function(data) {
	            if (data.msg == 1) {
	                alert('删除成功');
	                // 移除删除数据所在的tr
	                tr.remove();
	            } else {
	                alert('删除失败');
	            }
	        }, 'json');
    	} 
    });
</script>
@endsection
@section('title', '商品列表页')