@extends('Admin.AdminPublic.public')
@section('admin')

<title>类别添加</title>

<article class="page-container">
    <form action="/admincates" method="post" class="form form-horizontal" id="form-member-add">
    <!-- 报错信息 -->
    	<div class="div" style="background:red;margin:30px auto;width:20%;text-align:center;border-radius:10px;">
        @if(session('error'))
            <font size="5" color="white">{{session('error')}}</font>
        @endif
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">类别名</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{old('name')}}"  id="username" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">父类</label>
            <div class="formControls col-xs-8 col-sm-9">
                <select class="select" size="1" name="pid">
                    <option value="0">--请选择--</option>
					@foreach($list as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
                </select>
            </div>
        </div>
        <div class="row cl">
        	{{csrf_field()}}
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

@endsection
@section('title', '类别添加')