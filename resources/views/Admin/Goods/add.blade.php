@extends('Admin.AdminPublic.public')
@section('admin')

<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

<title>商品添加</title>

<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/admingoods" method="post" enctype="multipart/form-data">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品名:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">描述:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor" type="text/plain" name="dcr"   style="width:800px;height:300px;"></script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div>
					<input type="file" name="pic"  class="input-text">
				</div>
			</div>
		</div>
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">类别:</label>
            <div class="formControls col-xs-8 col-sm-9">
                <select class="select" size="1" name="cid">
                    <option value="0" disabled="disabled">--请选择--</option>
					@foreach($cate as $row)
                    <option value="{{$row->id}}" >{{$row->name}}</option>
					@endforeach
                </select>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">单价:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" value="" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{csrf_field()}}
				<input  class="btn btn-primary radius" type="submit" value="添加商品">
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
@section('title', '商品添加')