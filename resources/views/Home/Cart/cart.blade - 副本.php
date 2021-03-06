@extends("Home.HomePublic.public")
@section('home')
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/static/home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
<link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/show.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin">
<script src="/static/home/js/common_js.js" type="text/javascript"></script>
<script src="/static/home/js/footer.js" type="text/javascript"></script>
<title>购物车</title>
</head>
<body id="order">
 <!--购物车样式-->
    <div class="hd_Shopping_list" id="Shopping_list">
        <div class="dorpdown-layer">
            <div class="spacer"></div>
            <div class="prompt"></div>
            <div class="nogoods"><b>购物车中还没有商品，赶紧选购吧！</b></div>
            <ul class="p_s_list">     
                <li>
                    <div class="img"><img src="/static/1.jpg"></div>
                    <div class="content">
                        <p><a href="#">产品名称</a></p>
                        <p>颜色分类:紫花8255尺码:XL</p>
                    </div>
                    <div class="Operations">
                        <p class="Price">￥55.00</p>
                        <p><a href="#">删除</a></p>
                    </div>
                </li>
            </ul>   
            <div class="Shopping_style">
                <div class="p-total">
                    共<b>1</b>件商品　共计
                    <strong>￥ 515.00</strong>
                </div>
                <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
            </div>  
        </div>
    </div>
<!--购物车样式-->
    <div class="Inside_pages clearfix">
        <div class="shop_carts">
            <div class="Process"><img src="/static/home/images/Process_img_01.png" /></div>
            <div class="Shopping_list">
            <div class="title_name">
                <ul>
                    <li class="checkbox"></li>
                    <li class="name">商品名称</li>
                    <li class="bdj" style="margin-left:18px">本店价</li>
                    <li class="sl" style="margin-left:-20px">购买数量</li>
                    <li class="xj" style="margin-left:32px">小计</li>
                    <LI class="cz">操作</LI>
                </ul>
            </div>
            <div class="shopping">
                <table class="table_list">
                        @if (!count($data)==0)
                        <!-- 遍历开始 -->
                        @foreach ($data as $key=>$row)
                        <p hidden id="hidden"></p>
                        <tr class="tr">
                            <td class="checkbox">
                                <input name="checkitems" type="checkbox" value="{{$row->id}}" />
                            </td>
                            <td class="name">
                                <div class="img"><a href="#"><img src="{{$row->pic}}" /></a></div>
                                <div class="p_name"><a href="#">{{$row->name}}</a></div>
                            </td>
                            <td class="bgj sp" >
                                <span id="price_item_1">
                                    ￥<span class="price">{{$row->price}}</span>
                                </span>
                            </td>
                            <td class="sl">
                                <div class="Numbers">
                                    <a class="numbtn" style="cursor:pointer;">-</a>
                                    <input type="text" readonly="readonly"  name="qty_item_" value="{{$row->total}}" id="{{$row->goods_id}}" class="number_text">
                                    <a class="numbtn" style="cursor:pointer;">+</a>
                                </div>
                            </td>
                            <!--小计 -->
                            <td class="xj">
                                <span>￥</span>
                                <span class="xiaoji littleprice">{{$row->price * $row->total}}</span>
                                <p id="littleprice" hidden></p>
                            </td>
                            <td class="cz">
                                <form action="/cart/{{$row->id}}" method="post">
                                    <button type="submit">删除</button>
                                    {{csrf_field()}}
                                    {{method_field("DELETE")}}
                                </form>
                                <p><a href="">收藏该商品</a></p>
                            </td>
                            <td class="scj sp"><span id="Original_Price_1"></span></td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="tr">
                            <center>
                                <h1 style="margin-top:130px">
                                    <a href="/index">您还没有选购产品 点我继续查看产品</a>
                                </h1>
                            </center>
                        </tr>
                        @endif
                        <!-- 遍历结束 -->
                </table>
                <div class="sp_Operation clearfix">
                    <div class="select-all">
                    <div class="cart-checkbox"><a href="javascript:void(0);" class="allchoose" style="float:left;margin-left:7px">全选</a></div>
                    <div class="operation"><a href="javascript:void(0);" class="delchoose" style="float:left;margin-left:7px" onclick="">删除选中</a></div> 
                </div>    
                <!--结算-->
                <div class="toolbar_right">
                    <ul class="Price_Info">
                        <li class="p_Total">
                            <label class="text">商品总价：</label>
                            <span>￥</span>
                            <span class="price sumPrice" id="totalprice"></span>
                        </li>
                        <!-- <li class="Discount">
                            <label class="text">以&nbsp;&nbsp;节&nbsp;&nbsp;省：</label>
                            <span class="price" id="Preferential_price"></span>
                        </li>
                        <li class="integral">本次购物可获得
                            <b id="total_points"></b>积分
                        </li>  -->
                    </ul>
                    <div class="btn">
                    @if (!count($data)==0)
                    <!-- 这是去订单页 付款-->
                    <a class="cartsubmit" href="/order/{{$uid}}"></a>
                    <!-- 这是再看看 回首页 -->
                    <a class="continueFind" href="/index"></a>
                    @endif
                  </div>
                </div>
  </div>
 </div>

<script type="text/javascript">
  /******ajax跳转订单页(保存数据)******/

  function goorder()
  {

    var price = parseFloat($('.numbtn').parents('.sl').prev().find('.price').html());
    var total = parseFloat($('#totalprice').html());//获取总价
    var num   = $('#qty_item_1').val();
    // alert(num);return;
    var num = parseInt($(this).prev().val()) + 1;  //获取数量
      //如果超出库存，不加

      var t = $('#totalprice').html();
      // alert(t);
      // alert(goodsid);
      /*********ajax*********/
      $.get('/order',{
      uid:'{{$uid}}',
      totalprice:t
      },function(data){
      alert(data);
      // window.location.href = "/order";
      $('#html').html(data);      
    });
  }




  /*****初始总价******/
  $(function(){
    var t = 0;
    $('.xiaoji').each(function(){
      t += parseFloat($(this).html());//循环出每个小计数目并相加
    });
    $('#totalprice').html(t);//初始总价
  })
  /******商品数量的加和减*****/  
  $(".numbtn").click(function(){
    var price = parseFloat($(this).parents('.sl').prev().find('.price').html());//获取单价
    var total = parseFloat($('#totalprice').html());//获取总价
    //根据标签中字符判断
    if ($(this).html() == '+') {
      var num = parseInt($(this).prev().val()) + 1;  //获取数量
      //如果超出库存，不加

      var t = total + price;
      $(this).prev().val(num);  //修改num的数量
      var goodsid = $(this).prev().attr('id');
      // alert(goodsid);
      /*********ajax*********/
      $.get('/cart/{{$uid}}',{
      num:num,
      goodsid:goodsid,
      uid:'{{$uid}}'
      },function(data){
      // alert(data);

      });
    } else {
      var num = parseInt($(this).next().val()) - 1;  //获取数量
      if (num <= 0) {
        alert('数量不能少于1个');
        return;
      }
      var t = total - price;
      $(this).next().val(num);  //修改num的数量

      var goodsid = $(this).prev().attr('id');
      // alert(goodsid);
      /*********ajax*********/
      $.get('/cart/{{$uid}}',{
      num:num,
      goodsid:goodsid,
      uid:'{{$uid}}'
      },function(data){
      // alert(data);

      });
    }
    $(this).parents('.sl').next().find('.xiaoji').html(price*num);//修改小计
    $('#totalprice').html(t);//修改总价
 });
</script>

 <!--推荐产品样式-->
 <div class="recommend_shop">
   <div class="title_name">推荐购买</div>
   <div class="recommend_list">
    <div class="hd">
     <a class="prev" href="javascript:void(0)">&gt;</a>
     <a class="next" href="javascript:void(0)">&lt;</a>
    </div>
    <div class="bd">
      <ul>
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_45.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_5.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_36.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_25.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
       
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_15.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
       <li class="recommend_info">
       <a href="#" class="buy_btn">立即购买</a>
       <a href="#" class="img"><img src="/static/home/products/p_37.jpg" width="160px" height="160px"/></a>
       <a href="#" class="name">光明莫斯利安酸牛奶 巴氏杀菌常温200g*12盒钻石装</a>
       <h4><span class="Price"><i>RNB</i>123.00</span></h4>
       </li>
      </ul>  
    </div>
   </div>
 </div>
 </div>
<div class="fixedBox">
  <ul class="fixedBoxList">
      <li class="fixeBoxLi user"><a href="User.html"><span class="fixeBoxSpan iconfont icon-yonghu"></span><strong>用户</strong></a></li>
      <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
      <p class="good_cart">0</p>
      <span class="fixeBoxSpan iconfont icon-cart"></span> <strong>购物车</strong>
      <div class="cartBox">
          <div class="bjfff"></div><div class="message">购物车内暂无商品，赶紧选购吧</div>
      </div>
      </li>
      <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
      <span class="fixeBoxSpan iconfont icon-erweima"></span> <strong>微信</strong>
      <div class="cartBox">
          <div class="bjfff"></div>   
      </div>
      </li>

    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong> </a> </li>
    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong> </a> </li>
    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong> </a> </li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>
</body>
</html>
<script>
//全选
$('.allchoose').click(function(){
  $(".Shopping_list").find('tr').each(function(){
    $(this).find(':checkbox').attr('checked',true);
  })

});
// 删除选中
$('.delchoose').click(function(){
  arr = [];
  $(':checkbox').each(function(){
    if($(this).prop('checked')){
      id = $(this).val();
      arr.push(id);
    }
  });
  alert(arr);
  uid = {{$uid}};
  //ajax
  $.get('/cartchoosedel',{arr:arr,uid:uid},function(data){
    // alert(data);
    if(data == 1){
      alert('删除成功');
      
      for (var i = 0;i < arr.length;i++){
         $('input[value="'+arr[i]+'"]').parents('tr').remove();
      }
    }else{
      alert(data);
    }
  });
});
</script>
@endsection
@section('title','会员列表')