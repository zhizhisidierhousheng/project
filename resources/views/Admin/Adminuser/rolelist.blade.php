@extends('Admin.AdminPublic.public')
@section('admin')
<article class="page-container">
    <form action="/saverole" method="post"> 
        <div>
            <h3>当前管理员:<font color="red">{{$info->name}}</font></h3>
            <div style="width:200px;text-align:center;color:#ccc;font-size:30px;margin:auto">角色信息</div>
            <div style="margin:auto;width:200px;">
                <ul >
                    @foreach($role as $row)
                    <li style="folat:left;margin:10px;">
                        <input type="checkbox" name="rid[]" value="{{$row->id}}" id="{{$row->id}}" @if(in_array($row->id, $rids)) checked @endif>
                        <label for="{{$row->id}}">{{$row->name}}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div style="width:340px;margin:10px auto;text-align:center;">
            {{csrf_field()}}
            <input type="hidden" name="uid" value="{{$info->id}}">
            <input value="分配角色" class="btn btn-success" type="submit">
            <input value="恢复默认" class="btn btn-danger" type="reset">
        </div>
        <div class="div" style="margin:30px auto;width:80%;text-align:center;background:lightgreen;border-radius:10px;">
            @if(session('success'))
            <font size="20" color="white">{{session('success')}}</font>
            @endif
        </div>
    </form>
</article>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script>
   $('.div').click(function(){
        $(this).hide();
   });
</script>
@endsection
@section('title', '后台角色分配')