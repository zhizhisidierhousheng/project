﻿@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
@endforeach
@endif
<table class="table table-border table-bordered table-bg">
	<thead>
		<tr>
			<th scope="col" colspan="9">会员列表</th>
		</tr>
		<tr class="text-c">
			<th>ID</th>
			<th>会员名</th>
			<th>手机号</th>
			<th>邮箱</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $row)
		<tr class="text-c">
			<td>{{$row->id}}</td>
			<td>{{$row->name}}</td>
			<td>{{$row->phone}}</td>
			<td>{{$row->email}}</td>
			<td class="td-manage"> 
				<a href="javascript:void(0)" class="btn btn-success" onclick="layer_show('会员详情', '/users/{{$row->id}}', 1500, 500)">会员详情</a>
				<a href="javascript:void(0)" class="btn btn-warning" onclick="layer_show('收货地址', '/usersaddress/{{$row->id}}', 1000, 500)">收货地址</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
