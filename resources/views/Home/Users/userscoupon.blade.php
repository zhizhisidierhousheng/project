@extends("Home.HomePublic.public")
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
                        <img src="{{$pic-pic}}" /> 
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
                                <li> <a href="/home/usersinfo"> 会员信息</a></li> 
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
                                <li> <a href="user.php?act=myshop">密保管理</a></li> 
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
                    <!--<div class="prompt">你还没有优惠劵</div>--> 
                    <div class="clearfix"> 
                        <ul class="coupons"> 
                            <li class="Numbering">YHJ1234567445623GB</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>100</b>
                                    <h4>订单满1000</h4>
                                </div> 
                                <div class="coupons_name">消费卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul> 
                        <ul class="coupons"> 
                            <li class="Numbering">YHJ1234567445623GB</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>50</b>
                                    <h4>订单满500</h4>
                                </div> 
                                <div class="coupons_name">消费卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul> 
                        <ul class="coupons"> 
                            <li class="Numbering">YHJ1234567445623GB</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>20</b>
                                    <h4>订单满300</h4>
                                </div> 
                                <div class="coupons_name">购物卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul> 
                        <ul class="coupons on"> 
                            <div class="status">已过期</div> 
                            <li class="Numbering">YHJ1234567445623GB</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>20</b>
                                    <h4>订单满300</h4>
                                </div> 
                                <div class="coupons_name">购物卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul> 
                        <ul class="coupons on"> 
                            <div class="status">已使用</div> 
                            <li class="Numbering">YHJ1234567445623GB</li> 
                            <li class=" clearfix"> 
                                <div class="coupons_Money">
                                    ￥
                                    <b>20</b>
                                    <h4>订单满300</h4>
                                </div> 
                                <div class="coupons_name">购物卷</div> 
                            </li> 
                            <li class="time">2016-3-12至2016-3-30</li> 
                        </ul> 
                    </div> 
                    <div class="add_coupons"> 
                        <h3>添加优惠劵序列号</h3> 
                        <div>优惠券序列号 
                            <input name="" type="text" class="textcoupons" />
                            <input name="" type="submit" value="添加优惠劵" class="ADD_btn" />
                        </div> 
                        <div class="prompt">
                            该优惠劵获取方式： 
                            <br />1.用户消费满一定金额系统自动发放相应优惠劵金额。
                            <br />2.需向管理领取优惠劵序列号 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>  
</body>
@endsection
@section('title', '我的优惠券')