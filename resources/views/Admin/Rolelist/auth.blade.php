@extends('Admin.AdminPublic.public')
@section('admin')
<article class="page-container">
    <form action="/saveauth" method="post"> 
        <div>
            <h3>当前角色:<font color="red">{{$role->name}}</font></h3>
            <div style="width:200px;text-align:center;color:#ccc;font-size:30px;margin:auto">权限信息</div>
            <div style="margin:auto;width:200px;">
                <ul >
                    @foreach($node as $row)
                    <li style="folat:left;margin:10px;">
                        <input type="checkbox" name="nid[]" value="{{$row->id}}" id="{{$row->id}}" @if(in_array($row->id, $nid)) checked @endif>
                        <label for="{{$row->id}}">{{$row->name}}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div style="width:340px;margin:10px auto;text-align:center;">
            {{csrf_field()}}
            <input type="hidden" name="rid" value="{{$role->id}}">
            <input type="hidden" name="id" value="{{$row->id}}">
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
   $('.div').click(function(){
        $(this).hide();
   });
</script>
@endsection
@section('title', '角色权限分配')