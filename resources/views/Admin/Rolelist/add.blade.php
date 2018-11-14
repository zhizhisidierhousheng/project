@extends("Admin.AdminPublic.public")
@section('admin')


<title>@yield('title') </title>

<article class="page-container">
	<!-- 报错信息 -->
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
	<form class="form form-horizontal" id="form-admin-add" action="/adminrolelist" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="角色名称" id="adminName" name="name">
			</div>
		</div>
		
		{{csrf_field()}}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="myflash('adminrolelist', '角色列表', '/adminrolelist/create')">
			</div>
		</div>
	</form>
</article>

@endsection
@section('title', '角色添加')