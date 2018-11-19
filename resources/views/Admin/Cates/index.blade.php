@extends("Admin.AdminPublic.public")
@section("admin")

<style>
	.div{margin: 30px auto; width: 20%; text-align: center;border-radius: 10px; background: lightgreen;}
</style>
<title>类别列表</title>

<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 类别管理 <span class="c-gray en">&gt;</span> 类别列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c"> 
			<form action="/admincates" method="get">
				<input type="text" name="keywords" placeholder="类别名" style="width:250px" class="input-text" value="{{$request['keywords'] or ''}}">
				<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i></button>
			</form>
		</div>
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
						<th >ID</th>
						<th >类别名</th>
						<th >父类</th>
						<th>path</th>
						<th >操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cate as $row)
					<tr class="text-c va-m">
						<td>{{$row->id}}</td>
			       		<td>{{$row->name}}</td>
			       		<td>{{$row->pid}}</td>
			       		<td>{{$row->path}}</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5"  href="/admincates/{{$row->id}}/edit" title="修改">
								<i class="Hui-iconfont">&#xe6df;</i>
							</a> 
							<form action="admincates/{{$row->id}}" method="post">
							 	{{csrf_field()}}
	                            {{method_field("DELETE")}}
								<button style="text-decoration:none" class="ml-5"  type="submit" title="删除">
								<i class="Hui-iconfont">&#xe6e2;</i>
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div id="pages">
				{!!$cate->appends($request)->render()!!}
			</div>
		</div>
	</div>
</div>

@endsection
@section('title', '类别列表页')