@extends("Admin.AdminPublic.public")
@section("admin")

<title>@yield('title')</title>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员详情 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">会员详情</th>
			</tr>
			<tr class="text-c">
				<th>会员ID</th>
				<th>真实姓名</th>
				<th>头像</th>
				<th>年龄</th>
				<th>性别</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>{{$info->uid}}</td>
				<td>{{$info->username}}</td>
				<td>{{$info->pic}}</td>
				<td>{{$info->age}}</td>
				<td>{{$info->sex}}</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection
@section('title', '会员详情')