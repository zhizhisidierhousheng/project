<table class="table table-border table-bordered table-bg looppictable">
    <thead>
        <tr>
            <th scope="col" colspan="9">轮播图列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"></th>
            <th width="40">ID</th>
            <th width="150">图片描述</th>
            <th width="250">图片</th>
            <th width="100">是否已启用</th>
            <th width="100">操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row1)
        <tr class="text-c">
            <td><input type="checkbox" value="{{$row1->id}}" name="" id="checkbox"></td>
            <td>{{$row1->id}}</td>
            <td>{{$row1->dcr}}</td>
            <td><img src="{{$row1->url}}" alt=""></td>
            <td class="td-status">
                @if($row1->status == 0)
                    <span class="label label-warning radius">已禁用</span>
                @else
                    <span class="label label-success radius" >已启用</span> 
                @endif
            </td>
            <td class="">
                <a style="text-decoration:none" onClick="picture_edit(this,{{$row1->id}})" href="javascript:;" >
                    <i class="Hui-iconfont Hui-iconfont-1">
                    @if($row1->status == 0)
                        &#xe631;
                        <span class="hidden">{{$row1->status}}</span>
                    @else
                        &#xe615;
                        <span class="hidden">{{$row1->status}}</span>
                    @endif
                    </i>
                </a>
                <a onclick="picture_del(this,{{$row1->id}})" class="ml-5" style="text-decoration:none">      
                    <i class="Hui-iconfont">&#xe6e2;</i>
                </a>       
            </td>
        </tr>
        @endforeach
    </tbody>
</table>