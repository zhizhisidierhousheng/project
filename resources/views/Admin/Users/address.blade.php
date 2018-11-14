@extends("Admin.AdminPublic.public")
@section("admin")

<title>@yield('title')</title>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员收货地址 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">会员收货地址</th>
			</tr>
			<tr class="text-c">
				<th>会员ID</th>
				<th>收货人</th>
				<th>收货手机号</th>
				<th>收货地区</th>
				<th>详细地址</th>
				<th>默认地址否</th>
			</tr>
		</thead>
		<tbody>
			@foreach($address as $row)
			<tr class="text-c">
				<td>{{$row->uid}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->phone}}</td>
				<td>{{$row->area}}</td>
				<td>{{$row->address}}</td>
				<td class="td-manage">
					{{$row->status}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
@section('title', '会员收货地址')