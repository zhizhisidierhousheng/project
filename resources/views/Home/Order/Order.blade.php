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
<script src="/static/home/js/jquery.reveal.js" type="text/javascript"></script>
<script src="/static/home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
<script src="/static/home/js/common_js.js" type="text/javascript"></script>
<script src="/static/home/js/footer.js" type="text/javascript"></script>
<title>订单确认页</title>
</head>
 <script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
<body>
<!--确认订单页样式-->
 <div class="Inside_pages clearfix" id="Orders">
 <div class="Process"><img src="/static/home/images/Process_img_02.png" /></div>
 <div class="Orders_style clearfix">
   <!--地址信息样式-->
  @foreach ($address as $row)
  <div class="Address_info">
    <div class="title_name">

      默认收货地址
      
      <a href="#">其他收货地址</a>
    </div>
    <ul>
     <li><label>收件人姓名：</label><span class="uname">{{$row->name}}</span></li>
     <li><label>收件人地址：</label><span class="uaddress">{{$row->address}}</span></li>
     <li><label>收件人电话：</label><span class="uphone">{{$row->phone}}</span></li>
    </ul>
  </div>
  @endforeach
 </div>
 <form class="form" method="post"> 
 <fieldset>  
 <!--快递选择-->
<!--<div class="express_delivery">
      <div class="title_name">选择快递方式</div>  
      <ul class="dowebok">
	      <li><input type="radio" name="radio" data-labelauty="圆通快递">
          <div class="description">
            <em class="arrow"></em>
            <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
            <p>资费：15元</p>
            <p class="Note">满68元包邮</p>
            <p><a href="#">点击查看是否在配送范围内</a></p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="中通快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="申通快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="邮政EMS">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="城际快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：同城包邮</p>
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="韵达快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="国通快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="顺丰快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满88元包邮</p>
          </div>
        </li>
	      <li><input type="radio" name="radio" data-labelauty="邮政小包">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="天天快递">
          <div class="description">
           <em class="arrow"></em>
           <p>到付价格=现付价格*1.25 ，不足1元按1元收取，到付最低15元起。此价格供参考，详情请咨询圆通当地营业网点</p>
           <p>资费：15元</p>
           <p class="Note">满68元包邮</p>
          </div>
        </li>
        </ul>            
    </div>
      <!--付款方式-->
     <div class="payment">
      <div class="title_name">支付方式</div>
       <ul>
        <li><input type="radio" name="radio1" data-labelauty="支付宝" checked>本订单暂时只支持支付宝支付</li>
       </ul>
     </div>
     <!-- 这是红包（可以用来做优惠券） -->
<!--     <div class="invoice_style">
      <ul>
        <li class="invoice_left"><input name="" type="checkbox" value="" data-labelauty="是否开发票"/></li>
        <li class="invoice_left">
          <select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
              <option disabled="disabled" selected="selected">发票类型</option>
              <option value="办公用品">办公用品</option>
              <option value="食品">食品</option>
              <option value="20元红包">20元红包</option>
              <option value="50元红包">50元红包</option>
              <option value="100元红包">100元红包</option>
              <option value="200元红包">200元红包</option>
          </select>
        </li>
        <li class="invoice_left">发票抬头
         <input name="" type="text" class="text_info" />
        </li>
        <li class="invoice_left">
         <select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
              <option disabled="disabled" selected="selected">发票内容</option>
              <option value="办公用品">办公用品</option>
              <option value="食品">食品</option>
              <option value="数码配件">数码配件</option>
              <option value="电脑">电脑</option>
              <option value="手机">手机</option>
              <option value="200元红包">200元红包</option>
          </select>
        </li>
      </ul>
    </div> -->
     <!--产品列表-->
     <div class="product_List">
      <table>
       <thead>
        <tr class="title">
          <td class="name">商品名称</td>
          <td class="price">商品价格</td>
          <td class="Quantity">购买数量</td>
          <td class="Money">金额</td></tr></thead>
       <tbody>
        @foreach ($data as $r)
        <tr>
          <td class="Product_info">
           <a href="#"><img src="{{$r->pic}}"  width="100px" height="100px"/></a>
           <center><a href="#" class="product_name" style="margin-top:45px;margin-left:25px;">{{$r->name}}</a></center>
           </td>
          <td><i>￥</i>{{$r->price}}</td>
          <td>{{$r->total}}</td>
          <td><i>￥</i><span class="xiaoji">{{$r->price * $r->total}}</span></td>
        </tr>
        @endforeach
       </tbody>
      </table>
      
      <div class="Pay_info">
       <label>订单留言</label><input name="" type="text"  onkeyup="checkLength(this);" class="text_name " />  <span class="wordage">剩余字数：<span id="sy" style="color:Red;">50</span></span>  
      </div>
      <!--价格-->
    <div class="price_style">
      <div class="right_direction">
        <ul>
         <li><label>商品总价</label><i>￥</i><span class="totalprice"></span></li>
         <!-- <li><label>优惠金额</label><i>￥</i><span>-23.00</span></li> -->
         <li><label>配&nbsp;&nbsp;送&nbsp;&nbsp;费</label><i></i><span>此单包邮</span></li>
         <li class="shiji_price"><label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label><i>￥</i><span class="totalprice"></span></li>    
        </ul>   
        <div class="btn">
          <input name="submit" type="submit" value="提交订单" class="gopay submit_btn"/> <input name="" type="button"  onclick="window.location.href = '/cart'" value="返回购物车"  class="return_btn"/>
        </div>
        <!-- <div class="integral right">待订单确认后，你将获得<span>345</span>积分</div> -->
      </div>
    </div>
  </div>  
 </fieldset>
 </form>
 </div>
<!--  <script type="text/javascript">
// function checkLength(which) {
// 	var maxChars = 50; //
// 	if(which.value.length > maxChars){
// 		alert("您输入的字数超出限制!");
// 		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
// 		which.value = which.value.substring(0,maxChars);
// 		return false;
// 	}else{
// 		var curr = maxChars - which.value.length; //250 减去 当前输入的
// 		document.getElementById("sy").innerHTML = curr.toString();
// 		return true;
// 	}
// }
</script> -->
<script>
//去支付页 并用ajax存数据
$('.gopay').click(function(){
  uname    = $('.uname').html();
  uphone   = $('.uphone').html();
  uaddress = $('.uaddress').html();
  alert(uaddress);return false;
});
//算小计和总价
$(function(){
  var t = 0;
  $('.xiaoji').each(function(){
    t += parseFloat($(this).html());//循环出每个小计数目并相加
  });
  $('.totalprice').html(t);//初始总价
});

$(function(){
	$(':input').labelauty();
});
</script>
</body>
</html>
@endsection
@section('title','订单')
