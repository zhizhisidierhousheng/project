  <table class="table table-border table-bordered table-bg relinktable">
    <thead>
      <tr>
        <th scope="col" colspan="9">员工列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"></th>
        <th width="40">ID</th>
        <th width="150">网站名称</th>
        <th width="250">邮箱</th>
        <th>友情链接URL</th>
        <th width="100">是否已启用</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row1)
      <tr class="text-c">
        <td><input type="checkbox" value="{{$row1->id}}" name=""></td>
        <td>{{$row1->id}}</td>
        <td>{{$row1->name}}</td>
        <td>{{$row1->email}}</td>
        <td>{{$row1->url}}</td>
        <td class="td-status">
          @if($row1->status == 0)
          <span class="label label-warning radius">
           已禁用
           </span>
          @else
          <span class="label label-success radius">
           已启用
           </span> 
          @endif
        </td>
        <td class="">
          <a style="text-decoration:none" onClick="admin_stop(this,{{$row1->id}})" href="javascript:;" >
          <i class="Hui-iconfont">
            @if($row1->status == 0)
              &#xe631;
              <span class="hidden">{{$row1->status}}</span>
            @else
              &#xe615;
              <span class="hidden">{{$row1->status}}</span>
            @endif
            </i>
          </a>
          <a onclick="admin_del(this,{{$row1->id}})" class="ml-5" style="text-decoration:none">
        
          <i class="Hui-iconfont">&#xe6e2;</i></a></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>