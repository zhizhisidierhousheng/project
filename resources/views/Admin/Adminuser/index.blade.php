@extends("Admin.AdminPublic.public")
@section("admin")

<title>@yield('title')</title>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.js"></script>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th>ID</th>
				<th>登录名</th>
				<th>密码</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $row)
			<tr class="text-c">
				<td>{{$row->id}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->password}}</td>
				
				<td class="td-manage">
					<a style="text-decoration:none" href="javascript:void(0)" title="分配角色" onclick="layer_show('分配角色', '/rolelist/{{$row->id}}', 800, 500)"><i class="Hui-iconfont">&#xe61d;</i></a> 

					<a title="编辑信息" href="/adminuser/{{$row->id}}/edit"  class="ml-5" style="text-decoration:none" ><i class="Hui-iconfont">&#xe6df;</i></a> 

					<a title="删除" href="javascript:;"  class="ml-5 del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
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

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
// 获取删除按钮 管理员删除
    $('.del').click(function() {
    	if (confirm('确认删除吗')) {
    		id = $(this).parents('tr').find('td:first').html();
	        // 获取删除数据所在的tr
	        tr = $(this).parents('tr');
	        //  Ajax
	        $.get('/adminuserdel', {id:id}, function(data) {
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
    // 隐藏
    $('.div').click(function(){
        $(this).hide();
    });
</script>

@endsection
@section('title', '管理员列表')