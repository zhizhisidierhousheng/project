@extends('Admin.AdminPublic.public')
@section('admin')
<article class="page-container">
    <form action="/saveauth" method="post"> 
        <div>
            <h3>当前角色:<font color="red">{{$role->name}}</font></h3>
            <div style="width:200px;text-align:center;color:#ccc;font-size:30px;margin:auto">权限信息</div>
            <div style="margin:auto;width:400px;border:1px solid red;">
                <ul >
                    @foreach($node as $row)
                    <li style="float:left;width:150px;margin:10px 20px;">
                        <input type="checkbox" name="nid[]" value="{{$row->id}}" id="{{$row->id}}" @if(in_array($row->id, $nid)) checked @endif>
                        <label for="{{$row->id}}">{{$row->name}}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div style="width:340px;margin:10px auto;text-align:center;clear:both">
            {{csrf_field()}}
            <span><a class="btn btn-primary radius" href="javascript:;" id="reverse">反选</a></span>
            <input type="hidden" name="rid" value="{{$role->id}}">
            <input value="分配权限" class="btn btn-success" type="submit">
            <input value="恢复默认" class="btn btn-danger" type="reset">
        </div>
        <!-- 成功信息 -->
        <div class="div" style="margin:30px auto;width:80%;text-align:center;background:lightgreen;border-radius:10px;">
            @if(session('success'))
            <font size="20" color="white">{{session('success')}}</font>
            @endif
        </div>
    </form>
    
</article>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script>
    // 点击隐藏提示信息
    $('.div').click(function(){
        $(this).hide();
    });
    // 反选
    $('#reverse').click(function(){
        $('input[type=checkbox]').each(function(){
            $(this).prop('checked', !$(this).prop('checked'));
        });
    });
</script>
@endsection
@section('title', '角色权限分配')