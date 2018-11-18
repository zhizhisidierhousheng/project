@extends("Admin.AdminPublic.public")
@section("admin")

<title>@yield('title') </title>

<article class="page-container">
<!-- 报错信息 -->
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
	<div style="margin:auto;width:30%;font-size:40px;color:orange;text-align:center;">管理员修改</div>
	<form class="form form-horizontal" id="form-admin-add" action="/adminuser/{{$user->id}}" method="post">
		<input type="hidden" name="id" value="{{$user->id}}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">管理员名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$user->name}}" placeholder="管理员名称" id="adminName" name="name" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="新密码" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认密码" id="repassword" name="repassword">
			</div>
		</div>
		{{csrf_field()}}
		{{method_field('PUT')}}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@endsection
@section('title', '管理员修改')