@extends('Admin.AdminPublic.public')
@section('admin')

<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

<title>商品修改</title>

<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/admingoods/{{$info->id}}" method="post" enctype="multipart/form-data">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品名:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->name}}" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">描述:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor" type="text/plain" name="dcr" style="width:800px;height:300px;">{!!$info->dcr!!}</script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片:</label>
			<div style="width:100px;height:100px;border:1px solid #ddd;position:relative;left:298px;">
				<img src="{{$info->pic}}" width="100px" height="100px" alt="">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">新图片:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="pic" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">数量:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" value="{{$info->price}}" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<input type="hidden" name="id" value="{{$info->id}}">
				<input  class="btn btn-primary radius" type="submit" value="修改商品">
				<input class="btn btn-secondary radius" type="reset" value="重置">
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');
</script>
@endsection
@section('title', '商品修改')