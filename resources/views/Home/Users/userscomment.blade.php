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
                <div class="user_title">会员中心</div> 
                <div class="user_Head"> 
                    <div class="user_portrait"> 
                        <a href="/home/usersinfo" title="修改头像" class="btn_link"></a> 
                        <img src="{{$pic->pic}}" /> 
                        <div class="background_img"></div> 
                    </div> 
                    <div class="user_name"> 
                        <p><span class="name">{{Session::get('username')}}</span><a href="/forget">[修改密码]</a></p> 
                        <p>登录时间：{{Session::get('time')}}</p> 
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
                                <li> <a href="/home/usersinfo"> 会员信息</a></li> 
                                <li> <a href="/home/userscollect"> 我的收藏</a></li> 
                                <li><a href="/home/userscomment"> 我的评论</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_4"></em>安全中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/forget"> 修改密码</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                </div> 
                <script>
                    jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:false});
                </script> 
            </div> 
        </div> 
        <!--右侧样式--> 
        <div class="right_style"> 
            <div class="info_content"> 
                <div class="title_Section">
                    <span>我的评价</span>
                </div> 
                <div class="Order_form_list"> 
                    <table> 
                        @if(count($comment) > 0)
                        <thead> 
                            <tr>
                                <td class="list_name_title0">评价商品</td> 
                                <td class="list_name_title1">评价内容</td> 
                                <td class="list_name_title2">评级</td> 
                                <td class="list_name_title2">操作</td> 
                            </tr>
                        </thead>
                        @foreach($comment as $com)
                        <tbody> 
                            <tr class="Order_info">
                                <td colspan="4" class="Order_form_time" style="cursor:pointer">评价时间：{{$com->inputtime}}<em></em></td>
                            </tr> 
                            <tr class="Order_Details"> 
                                <td> 
                                    <table class="Order_product_style">
                                        <tbody>
                                            <tr> 
                                                <td> 
                                                    <div class="product_name clearfix"> 
                                                        <a href="/homegoods/{{$com->gid}}" class="product_img"><img src="{{$com->pic}}" width="80px" height="80px" /></a>
                                                    </div> 
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </td> 
                                <td class="split_line">{{$com->content}}</td> 
                                <td class="split_line">{{str_repeat('★', $com->start)}}{{str_repeat('☆', 5 - $com->start)}}</td>
                                <td class="operating">
                                    <form action="/home/userscomment/{{$com->id}}" method="post" id="com_del">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="javascript:document.getElementById('com_del').submit();">删除</a>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        <center><h1>您没有评价商品！</h1></center>
                        @endif
                    </table> 
                    <div id="pages" style="margin-left: 50px">
                        {{$comment->render()}}
                    </div>
                </div> 
                <script>
                    jQuery(".Order_form_list").slide({titCell:".Order_info", targetCell:".Order_Details",defaultIndex:0,delayTime:300,trigger:"click",defaultPlay:true,returnDefault:false});
                </script> 
            </div> 
        </div> 
    </div> 
</div>
</body>
@endsection
@section('title', '我的评价')