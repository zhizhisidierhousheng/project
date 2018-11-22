@extends("Home.Homepublic.public")
@section("home")
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/static/home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
    <script src="/static/home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
    <script src="/static/home/js/footer.js" type="text/javascript"></script>
    <script src="/static/home/dizhi/public/js/bootstrap.min.js"></script>
    <title>订单确认页</title>
</head>
<body>
<form class="form" method="post" action="/order">
<!--确认订单页样式-->
    <div class="Inside_pages clearfix" id="Orders">
    <div class="Process">
        <img src="/static/home/images/Process_img_02.png" />
    </div>
    <div class="Orders_style clearfix">
        <!--地址信息样式-->
        @foreach ($address as $row)
        <div class="Address_info">
            <div class="title_name">
        
                默认收货地址
                <button class="btn btn-success" style="float:right" onclick="opens()" disabled>自定义收货地址&nbsp;+</button>
            </div>
            <p>
                <input type="hidden" name="aid[]" value="{{$row->id}}">
                <input type="radio" checked>
                    <span>收件人姓名：</span>
                    <input type="hidden" name="name" value="{{$row->name}}">
                    <span>{{$row->name}}</span><br>
                    <span>收件人地址：</span>
                    <input type="hidden" name="address" value="{{$row->address}}">
                    <span>{{$row->address}}</span><br>
                    <span>收件人电话：</span>
                    <input type="hidden" name="phone" value="{{$row->phone}}">
                    <span>{{$row->phone}}</span><br>
                    <span>目标地址邮编：</span>
                    <input type="hidden" name="postalcode" value="{{$row->postalcode}}">
                    <span>{{$row->postalcode}}</span>
            </p>
                    
            <div class="addaddr" style="display:none">
                <div class="">
                    <div class="">
                        <!-- 这是模态框的头 -->
                        <div class="modal-header">
                            <!-- 关闭modal框的 data-dismiss -->
                            <button class="close" onclick="closes()" data-dismiss="modal">&times;</button>
                            <h3>添加收货地址</h3>
                        </div>
                        <div class="modal-body">
                                <div class="form-group" style="margin-left:40px">
                                    <label>收货人:</label>
                                    <input type="text" class="form-control" name="addname" value="">
                                </div>
                                <br>
                                <div class="form-group" style="margin-left:40px">
                                    <label>电话:</label>
                                    <input type="text" class="form-control" name="addphone">
                                </div>
                                <br>
                                <div class="form-group" style="margin-left:40px">
                                    <label>地址:</label>
                                    <input type="text" name="addcity">
                                </div>
                                <br>
                                <div class="form-group" style="margin-left:40px">
                                    <label>详细地址:</label>
                                    <input type="text" class="form-control" name="addaddress">
                                </div>
                                <br>
                                <div class="form-group" style="margin-left:40px">
                                    <label>邮编:</label>
                                    <input type="text" class="form-control" name="addpostalcode">
                                </div>

                                 <button class="btn btn-success" style="float:right" onclick="editaddr()">提交</button>
                                <span style="float:right;color:red;size:10px">*请确保所填写信息真实有效</span>
                        </div>
                        <div class="modal-footer">
                            <button class="btn  btn-info" data-dismiss="modal" onclick="closes()">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <script>
            //打开添加地址框
            function opens()
            {
                $('.addaddr').show();
            }
            //隐藏添加地址框
            function closes()
            {
                $('.addaddr').hide();
            }
            //提交并修改信息
            function editaddr()
            {
                alert($('input[name="addaddress"]').val());
                $$('input[name="addaddress"]').val();
                $('input[name="addname"]').val();
                $('input[name="addcity"]').val();
                $('input[name="addphone"]').val();
                alert($('input[name="postalcode"]').html());
            }
        </script>
    </div>
 
    <fieldset>
        <!-- 付款方式 -->
        <div class="payment">
            <div class="title_name">支付方式</div>
            <ul>
                <li><input type="radio" name="radio1" data-labelauty="支付宝" checked>本订单暂时只支持支付宝支付</li>
            </ul>
            </div>
     <!-- 产品列表 -->
        <div class="product_List">
            <table>
                <thead>
                    <tr class="title">
                        <td class="name">商品名称</td>
                        <td class="price">商品价格</td>
                        <td class="Quantity">购买数量</td>
                        <td class="Monsey">金额</td>
                    </tr>
                </thead>
                <tbody id="goods">
                    @foreach ($shop as $r)
                    <input type="hidden" name="ids[]" value="{{$r['id']}}">
                    <input type="hidden" name="goodsnum[]" value="{{$r['num']}}">
                    <input type="hidden" name="price[]" value="{{$r['goodsInfo']->price}}">
                    <input type="hidden" name="dcr[]" value="{{$r['goodsInfo']->dcr}}">
                    <input type="hidden" name="pic[]" value="{{$r['goodsInfo']->pic}}">
                    <tr>                   
                        <td class="Product_info">
                            <a href="/homegoods/{{$r['id']}}">
                                <img src="{{$r['goodsInfo']->pic}}" name="pic" title="{{$r['goodsInfo']->dcr}}" width="100px" height="100px"/>
                            </a>
                            <a href="/homegoods/{{$r['id']}}" name="name" class="product_name goodsname" style="margin-top:-60px;margin-left:270px;" title="{{$r['goodsInfo']->dcr}}">
                                {{$r['goodsInfo']->name}}
                            </a>
                        </td>
                        <td>
                            <i>￥</i><span name="price">{{$r['goodsInfo']->price}}</span>
                        </td>
                        <td>{{$r['num']}}</td>
                        <td>
                            <i>￥</i>
                            <span class="xiaoji">
                                {{$r['goodsInfo']->price * $r['num']}}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        <!-- 价格 -->
            <div class="price_style">
                <div class="right_direction">
                    <ul>
                        <li>
                            <label>商品总价</label>
                            <i>￥</i>
                            <span class="totalprice"></span>
                        </li>
                        <!-- <li>
                            <label>优惠金额</label>
                            <i>￥</i><span>-23.00</span>
                        </li>  -->
                        <li>
                            <label>配&nbsp;&nbsp;送&nbsp;&nbsp;费</label>
                            <i></i>
                            <span>此单包邮</span>
                        </li>
                        <li class="shiji_price">
                            <label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label>
                            <i>￥</i>
                            <span class="totalprice"></span>
                            <input type="hidden" name="total" value="">
                        </li>    
                    </ul>  
                    
                        <input type="submit" value="生成订单" class=" submit_btn btn btn-success"/>
                        <input name="" type="button"  onclick="window.location.href = '/cart'" value="返回购物车"  class="return_btn btn btn-danger"/>
                    <div class="integral right">
                        待订单确认后，你将获得<span>345</span>积分
                    </div>
                </div>
            </div>
        </div>  
    </fieldset>
    {{csrf_field()}}
</form>
</div>
</body>
<script type="text/javascript">
function address_add(title,url,w,h){
  layer_show(title,url,w,h);
}
//算小计和总价
$(function(){
  var t = 0;
  $('.xiaoji').each(function(){
    t += parseFloat($(this).html());//循环出每个小计数目并相加
  });
  $('.totalprice').html(t);//初始总价
  $('#total').html(t);
  $('input[name=total]').val(t);
});

$(function(){
	$(':input').labelauty();
});




</script>
</html>
@endsection
@section('title','订单')
