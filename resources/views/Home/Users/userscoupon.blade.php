@extends("Home.HomePublic.public")
@section('home')
<head> 
<link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" /> 
<link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
<script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
<script src="/static/home/js/jquery.sumoselect.js"></script> 
<script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
</head> 
<body> 
<!--优惠劵样式--> 
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
                        <p>访问时间：{{Session('time')}}</p> 
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
                                <li> <a href="/home/userscoupon">优惠劵</a></li> 
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
            <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script> 
            </div> 
        </div> 
        <!--右侧样式--> 
        <div class="right_style"> 
            <div class="info_content"> 
                <div class="title_Section">
                    <span>优惠劵</span>
                </div> 
                <div class="coupon_style clearfix"> 
                    @if(count($data) < 1)
                    <div class="prompt">你还没有优惠劵</div>
                    @else
                    <div class="clearfix">
                        @foreach($data as $row)
                        @if($row->status == 2)
                        <ul class="coupons"> 
                            <li class="Numbering">{{$row->id}}</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>{{$row->money}}</b>
                                </div> 
                                <div class="coupons_name">优惠卷</div> 
                            </li>
                            <li class="time">{{$row->create}}至{{$row->overdue}}</li> 
                        </ul>
                        @else
                        @if($row->status == 1)
                        <ul class="coupons on"> 
                            <div class="status">已使用</div> 
                            <li class="Numbering">{{$row->id}}</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>20</b>
                                </div> 
                                <div class="coupons_name">优惠卷</div> 
                            </li> 
                            <li class="time">{{$row->create}}至{{$row->overdue}}</li> 
                        </ul>
                        @else
                        <ul class="coupons on">
                            <div class="status">已过期</div> 
                            <li class="Numbering">{{$row->id}}</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>{{$row->money}}</b>
                                </div>
                                <div class="coupons_name">优惠卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    <div id="pages">{{$data->render()}}</div>
                    @endif
                </div> 
            </div> 
        </div> 
    </div> 
</div>  
</body>
@endsection
@section('title', '我的优惠券')