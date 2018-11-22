@extends("Admin.AdminPublic.public")
@section("admin")

<title>@yield('title')</title>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="/mypage.css">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 评论列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">评论列表</th>
			</tr>
			<tr class="text-c">
				<th>ID</th>
				<th>评论用户</th>
				<th>评论商品</th>
				<th>评论商品图片</th>
				<th>评论内容</th>
				<th>评论时间</th>
				<th>评论星级</th>
			</tr>
		</thead>
		<tbody>
		@if(!empty($data))
		@foreach($data as $row)
			<tr class="text-c">
				<td>{{$row->id}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->gname}}</td>
				<td><img src="{{$row->pic}}" height="100px"></td>
				<td>{{$row->content}}</td>
				<td>{{$row->inputtime}}</td>
				<td style="color:red">{{str_repeat('★', $row->start)}}{{str_repeat('☆', 5-$row->start)}}</td>
			</tr>
		@endforeach
		@else
			<tr class="text-c">
				<td colspan="7">暂无数据</td>
			</tr>
		@endif
		</tbody>
	</table>
	<div id="pages">
        {{$data->render()}}
    </div>
</div>
<!-- 错误成功信息 -->
<div class="div" style="margin:30px auto;width:40%;text-align:center;background:#FA5858;border-radius:10px;">
    @if(session('error'))
    <font size="20" color="white">{{session('error')}}</font>
    @endif
</div>
<div class="div" style="margin:30px auto;width:40%;text-align:center;background:lightgreen;border-radius:10px;">
    @if(session('success'))
   <font size="20" color="white">{{session('success')}}</font>
    @endif
</div>
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
	
<script type="text/javascript">
// 获取删除按钮 管理员删除
    $('.del').click(function() {
    	if (confirm('确认删除吗')) {
    		id = $(this).parents('tr').find('td:first').html();
	        // 获取删除数据所在的tr
	        tr = $(this).parents('tr');
	        //  Ajax
	        $.get('/authroledel', {id:id}, function(data) {
	            if(data.msg == 1) {
	                alert('删除成功');
	                // 移除删除数据所在的tr
	                tr.remove();
	            } else {
	                alert('删除失败');
	            }
	        }, 'json');
    	}
    });
    // 点击隐藏提示信息
    $('.div').click(function(){
        $(this).hide();
    });
</script>

@endsection
@section('title', '评论列表')