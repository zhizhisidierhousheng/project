@extends("Home.Homepublic.public")
@section("home")
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>>
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <script src="/static/home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
    <link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" />

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
                <button type="button" class="btn btn-success" style="float:right" onclick="opens()">自定义收货地址&nbsp;+</button>
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
                    <input type="hidden" name="postalcode" value="{{$row->postacode}}">
                    <span>{{$row->postacode}}</span>
            </p>
                    <!-- 自定义地址 -->
            <!-- <form action="/home/usersaddress" method="post" id="addr"> 
                        <div class="Add_Addresss"> 
                            <div class="title_name">
                                <i></i>添加地址
                            </div> 
                            <table> 
                                <tbody>
                                    <tr> 
                                        <td class="label_name" width="250px">收货区域</td> 
                                        <td colspan="3" class="select">
                                            <label> 省份 </label>
                                            <select class="kitjs-form-suggestselect " id="s_province" name="s_province"></select>
                                            <label> 市/县 </label>
                                            <select class="kitjs-form-suggestselect " id="s_city" name="s_city"></select>
                                            <label> 区/县 </label><select class="kitjs-form-suggestselect" id="s_county" name="s_county"></select>
                                            <script class="resources library" src="/static/home/address/area.js"></script>
                                            <script>_init_area();</script>
                                        </td> 
                                    </tr> 
                                    <tr>
                                        <td class="label_name">详细地址</td>
                                        <td>
                                            <input name="address" type="text" class="Add-text" />
                                            <i>（必填）</i>
                                        </td> 
                                        <td class="label_name">手&nbsp;&nbsp;机</td>
                                        <td>
                                            <input name="phone" type="text" class="Add-text" />
                                            <i>（必填）</i>
                                        </td> 
                                    </tr> 
                                    <tr> 
                                        <td class="label_name">收件人姓名</td>
                                        <td>
                                            <input name="name" type="text" class="Add-text" />
                                            <i>（必填）</i>
                                        </td> 
                                        <td class="label_name">邮&nbsp;&nbsp;编</td>
                                        <td>
                                            <input name="postacode" type="text" class="Add-text" value="000000" />
                                            <i>（必填）</i>
                                        </td> 
                                    </tr> 
                                    <tr>
                                        <td class="label_name"></td>
                                        <td></td>
                                        <td class="label_name"></td>
                                        <td></td> 
                                    </tr> 
                                </tbody>
                            </table> 
                            <div class="address_Note" style="color:red">
                                <span>注：</span>只能添加5个收货地址信息。请乎用假名填写地址，如造成损失由收货人自己承担。
                            </div>
                            <div class="btn">
                                {{csrf_field()}}
                                <input type="button" value="添加地址" class="Add_btn" onclick="check()">
                            </div> 
                        </div> 
                    </form> -->
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
                    
                        <input type="submit" value="生成订单" class=" submit_btn btn btn-success" style="margin-right: " />
                        <input name="" type="button"  onclick="window.location.href = '/cart'" value="返回购物车"  class="return_btn btn btn-danger"/>
                    
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

// $(function(){
// 	$(':input').labelauty();
// });




</script>
<script src="/static/home/purebox/bootstrap-transition.js"></script> 
<script src="/static/home/purebox/bootstrap-alert.js"></script> 
<script src="/static/home/purebox/bootstrap-modal.js"></script> 
<script src="/static/home/purebox/bootstrap-dropdown.js"></script> 
<script src="/static/home/purebox/bootstrap-scrollspy.js"></script> 
<script src="/static/home/purebox/bootstrap-tab.js"></script> 
<script src="/static/home/purebox/bootstrap-tooltip.js"></script> 
<script src="/static/home/purebox/bootstrap-popover.js"></script> 
<script src="/static/home/purebox/bootstrap-button.js"></script> 
<script src="/static/home/purebox/bootstrap-collapse.js"></script> 
<script src="/static/home/purebox/bootstrap-carousel.js"></script> 
<script src="/static/home/purebox/bootstrap-typeahead.js"></script> 
<script src="/static/home/purebox/bootstrap-affix.js"></script> 
<script src="/static/home/purebox/holder/holder.js"></script> 
<script src="/static/home/purebox/google-code-prettify/prettify.js"></script>
<script src="/static/home/purebox/jquery.resizable.js"></script>
</html>
@endsection
@section('title','订单')
