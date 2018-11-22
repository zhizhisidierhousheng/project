@extends("Admin.AdminPublic.public")
@section("admin")

<style>
	.div{margin: 30px auto; width: 20%; text-align: center;border-radius: 10px; background: lightgreen;}
	td img{width:50%;}
</style>
<title>商品详情</title>

<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品详情 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
						<th>商品ID</th>
						<th>商品名</th>
						<th>商品小图</th>
						<th>商品描述图</th>
						<th>库存</th>
						<th>生产许可编码</th>
						<th>配料</th>
						<th>包装方式</th>
						<th>生产日期</th>
						<th>到期日期</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				@if(!empty($data))
					<tr class="text-c">
						<td>{{$data->gid}}</td>
						<td>{{$data->gname}}</td>
						<td width="250px">{!!$data->pic_up!!}</td>
						<td width="250px">{!!$data->pic_down!!}</td>
						<td>{{$data->num}}</td>
						<td>{{$data->pro_num}}</td>
						<td>{{$data->material}}</td>
						<td>{{$data->package}}</td>
						<td>{{$data->pro_time}}</td>
						<td>{{$data->lmt_time}}</td>
						<td><a href="javascript:;" class="btn btn-warning del">删除</a></td>
					</tr>
				@else
					<tr class="text-c">
						<td colspan="11">暂无数据请添加</td>
					</tr>
				@endif	
				</tbody>
			</table>
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
	        $.get('/goodsinfodel', {id:id}, function(data) {
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
@section('title', '商品详情')