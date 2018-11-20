@extends("Home.HomePublic.public")
@section("home")
<head> 
<link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" /> 
<link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
<script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
<script src="/static/home/js/jquery.sumoselect.js"></script> 
<script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
<link rel="stylesheet" href="/mypage.css">
</head> 
<body id="body"> 
<!--订单管理--> 
<div class="user_style clearfix"> 
    <div class="user_center"> 
        <!--左侧菜单栏--> 
        <div class="left_style"> 
            <div class="menu_style"> 
                <div class="user_title">用户中心</div> 
                <div class="user_Head"> 
                    <div class="user_portrait"> 
                        <a href="/home/usersinfo" title="修改头像" class="btn_link"></a> 
                        <img src="{{$pic->pic}}" /> 
                        <div class="background_img"></div> 
                    </div> 
                    <div class="user_name"> 
                        <p><span class="name">化海天堂</span><a href="#">[修改密码]</a></p> 
                        <p>访问时间：2016-1-21 10:23</p> 
                    </div> 
                </div> 
                <div class="sideMen"> 
                    <!--菜单列表图层--> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_1"></em>订单中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/home/usersorder"> 我的订单</a></li> 
                                <li> <a href="/home/usersaddress">收货地址</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_2"></em>会员中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/home/usersinfo"> 用户信息</a></li> 
                                <li> <a href="/home/userscollect"> 我的收藏</a></li> 
                                <li> <a href="user.php?act=message_list"> 修改密码</a></li> 
                                <li><a href="user.php?act=comment_list"> 我的评论</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_3"></em>账户中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="User_coupon.html">优惠劵</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_4"></em>安全中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="user.php?act=myshop">密保设置</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                </div> 
            <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:false});</script> 
            </div> 
        </div> 
        <!--右侧样式--> 
        <div class="right_style"> 
            <div class="info_content"> 
                <div class="title_Section">
                    <span>订单管理</span>
                </div> 
                <div class="Order_Sort"> 
                    <ul> 
                        <li><a href="javascript:;" onclick="page(1, 0)"><img src="/static/home/images/icon-dingdan1.png" /><br />待发货（{{count($a)}}）</a></li> 
                        <li><a href="javascript:;" onclick="page(1, 1)"><img src="/static/home/images/icon-dingdan.png" /><br />已发货（{{count($b)}}）</a></li> 
                        <li><a href="javascript:;" onclick="page(1, 2)"><img src="/static/home/images/icon-kuaidi.png" <="" a="" /><br />派送中（{{count($c)}}）</a></li>
                        <a href="#"> </a>
                        <li class="noborder" onclick="page(1, 3)"><a href="javascript:;"><img src="/static/home/images/icon-weibiaoti101.png" /><br />已验收（{{count($d)}}）</a></li> 
                    </ul> 
                </div> 
                <div class="Order_form_list"> 
                    <table> 
                    @if(count($orders) > 0)
                        <thead> 
                            <tr>
                                <td class="list_name_title0">商品</td> 
                                <td class="list_name_title1">单价(元)</td> 
                                <td class="list_name_title2">数量</td> 
                                <td class="list_name_title4">实付款(元)</td> 
                                <td class="list_name_title5">订单状态</td> 
                                <td class="list_name_title6">操作</td> 
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody> 
                            <tr class="Order_info">
                                <td colspan="6" class="Order_form_time" style="cursor:pointer">下单时间：{{$order->time}} | 订单号：{{$order->id}} <em></em></td>
                            </tr> 
                            <tr class="Order_Details"> 
                                <td colspan="3"> 
                                    <table class="Order_product_style">
                                    @foreach($order->info as $info)
                                        <tbody>
                                            <tr> 
                                                <td> 
                                                    <div class="product_name clearfix"> 
                                                        <a href="#" class="product_img"><img src="/static/home/Products/p_2.jpg" width="80px" height="80px" /></a> 
                                                        <a href="3">{{$info->gdcr}}</a>
                                                        <p class="specification">礼盒装20个/盒</p> 
                                                    </div> 
                                                </td>
                                                <td>{{$info->gprice}}</td> 
                                                <td>{{$info->num}}</td> 
                                            </tr> 
                                        </tbody>
                                    @endforeach
                                    </table>
                                </td> 
                                <td class="split_line">{{$order->total}}</td> 
                                <td class="split_line">
                                    @if($order->status == 0)待发货@endif
                                    @if($order->status == 1)已发货@endif
                                    @if($order->status == 2)派送中@endif
                                    @if($order->status == 3)已验收@endif
                                </td> 
                                <td class="operating"> <a href="/home/usersorder/{{$order->id}}">查看详细</a>
                                    <form action="/home/usersorder/{{$order->id}}" method="post" id="order_del">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="javascript:document.getElementById('order_del').submit();">删除</a>
                                    </form>
                                </td>
                            </tr> 
                        </tbody>
                        @endforeach
                    @else
                        <center><h1>您的订单信息为空！</h1></center>
                    @endif
                    </table> 
                </div> 
            <script>jQuery(".Order_form_list").slide({titCell:".Order_info", targetCell:".Order_Details",defaultIndex:0,delayTime:300,trigger:"click",defaultPlay:true,returnDefault:false});</script> 
            </div> 
            <div class="Paging"> 
                <div class="Pagination" id="pages">
                    <ul>
                        @foreach($pagenum as $num)
                        <li><a href="javascript:;" class="btn" onclick="page({{$num}}, {{$status}})">{{$row}}</a></li>
                        @endforeach
                    </ul>
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
</body>
<script>
function page(page, status)
{
    $.get("/home/usersorder", {page:page, status:status}, function(data) {
        $('#body').html(data);
    });
}
</script>
@endsection
@section('title', '我的订单')