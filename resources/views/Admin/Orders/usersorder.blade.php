@extends("Admin.AdminPublic.public")
@section("admin")
  <nav class="breadcrumb">
   <i class="Hui-iconfont"></i> 首页 
   <span class="c-gray en">&gt;</span> 订单管理 
   <span class="c-gray en">&gt;</span> 订单列表 
   <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
  </nav> 
  <div class="pd-20"> 
   <div class="text-c">
    <form action="/admin/usersorder" method="get">
    <input type="text" class="input-text" style="width:250px" placeholder="输入订单号" name="oid" />
    <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button> 
    </form>
   </div> 
   <div class="cl pd-5 bg-1 bk-gray mt-20"> 
    <span class="l">共有数据：<strong>{{$num}}</strong> 条</span> 
   </div> 
   <table class="table table-border table-bordered table-hover table-bg table-sort"> 
    <thead> 
     <tr class="text-c"> 
      <th>订单号</th> 
      <th>会员名</th> 
      <th>付款金额(元)</th> 
      <th>订单生成时间</th> 
      <th>订单状态</th>
     </tr> 
    </thead> 
    <tbody>
     @foreach($orders as $order)
     <tr class="text-c"> 
      <td><u style="cursor:pointer" class="text-primary" onclick='layer_show("订单号：{{$order->id}}","/admin/usersorder/{{$order->id}}","900","500")' title="查询订单详情">{{$order->id}}</u></td> 
      <td>{{$order->name}}</td> 
      <td>{{$order->total}}</td>
      <td>{{date('Y-m-d H:i:s', $order->time)}}</td> 
      <td>
      <select name="status">
        <option value="0" @if($order->status == 0) selected @endif>待发货</option>
        <option value="1" @if($order->status == 1) selected @endif>已发货</option>
        <option value="2" @if($order->status == 2) selected @endif>派送中</option>
        <option value="3" @if($order->status == 3) selected @endif>已验收</option>
      </select>
      </td> 
     </tr>
     @endforeach
    </tbody> 
   </table> 
   <div id="pageNav" class="pageNav"></div> 
  </div> 
  <!--_footer 作为公共模版分离出去--> 
  <script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
  <script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script> 
  <script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script> 
  <script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
  <script type="text/javascript">
  $('select[name=status]').change(function(){
    oid = $(this).parents('tr').find('td:first').find('u').html();
    status = $(this).val();
    $.get("/admin/orderstatus", {oid:oid, status:status}, function(data) {
      if (data.msg == 1) {
        alert('修改成功');
      } else {
        $('select').val(data.status);
        alert('修改失败');
      }
    }, 'json');
  });
  </script>   
</body>
</html>
@endsection
@section('title', '订单列表')