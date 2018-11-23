@extends('Admin.AdminPublic.public')
@section('admin')

<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

<style>
    ul{display: inline-block;width: 100%;margin: 0;padding: 0;}
    li{list-style-type: none;margin: 5px;padding: 0;float:left;}
</style>

<title>商品添加</title>
<div class="page-container">
	
	<form class="form form-horizontal" id="form-article-add" action="/doaddgoodsinfo" method="post" enctype="multipart/form-data">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品名:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->name}}" name="gname" readonly="readonly">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品小图:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor" type="text/plain" name="pic_up"   style="width:100%;height:200px;"></script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品描述图:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor1" type="text/plain" name="pic_down"   style="width:100%;height:200px;"></script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">库存:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div>
					<input type="text" name="num"  class="input-text">
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">包装方式:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="radio" name="package" value="0" >箱装
				<input type="radio" name="package" value="1" >盒装
				<input type="radio" name="package" value="2" >袋装
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">生产许可编码:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="pro_num" value="" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">配料:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="material" value="" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<input type="hidden" name="id" value="{{$info->id}}">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{csrf_field()}}
				<input  class="btn btn-primary radius" type="submit" value="添加详情">
				<input class="btn btn-secondary radius" type="reset" value="重置">
			</div>
		</div>
	</form>
<!-- 报错信息 -->
	@if (count($errors) > 0)
  	@foreach ($errors->all() as $error)
    <div style="width:300px;height:20px;margin:auto;color:red;">{{ $error }}</div>
    @endforeach
	@endif
</div>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');
var ue = UE.getEditor('editor1');

</script>
@endsection
@section('title', '商品添加')