@extends("Admin.AdminPublic.public")
@section("admin")
    <div class="page-container"> 
        <form class="form form-horizontal" action="/admin/notice" method="post"> 
            <div class="row cl"> 
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公告标题：</label> 
                <div class="formControls col-xs-8 col-sm-9"> 
                    <input type="text" class="input-text" name="title" /> 
                </div> 
            </div> 
            <div class="row cl"> 
                <label class="form-label col-xs-4 col-sm-2">公告内容：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                <textarea name="content" cols="" rows="" class="textarea"></textarea> 
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p> 
                </div> 
            </div>
            <div class="row cl"> 
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2"> 
                {{csrf_field()}}
                    <button type="submit" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe632;</i>保存</button>
                    <button class="btn btn-default radius" type="button" onclick="removeIframe()">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection