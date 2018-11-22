@extends("Home.HomePublic.public")
@section('home')
<head> 
<link href="/static/home/css/mypages.css" rel="stylesheet" type="text/css" />
<script src="/static/home/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
<script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
</head>
<body> 
<!--用户收藏样式--> 
<div class="user_style clearfix"> 
    <div class="user_center"> 
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
                        <p>访问时间：{{Session::get('time')}}</p> 
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
                                <li> <a href="/home/userscoupon">优惠券</a></li> 
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
                <div class="collect_style r_user_style"> 
                    <div class="title_Section">
                        <span>会员收藏</span>
                    </div> 
                    <div class="collect"> 
                        <ul class="Quantity">
                            <li>收藏数：{{count($num)}}条</li>
                            <li></li>
                        </ul>
                        @if(count($goods) < 1)
                        <center><h1>您还没有收藏商品，快去收藏吧！</h1></center>
                        @else
                        <div class="collect_list"> 
                            <ul>
                            @foreach($goods as $row)
                                <li class="collect_p">
                                    <form action="/home/userscollect/{{$row->gid}}" method="post" id="collect_del">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="javascript:document.getElementById('collect_del').submit();"><em class="iconfont icon-close2 delete"></em></a>
                                        <a href="#" class="buy_btn">立即购买</a> 
                                    </form>
                                    <div class="collect_info"> 
                                        <div class="img_link"> 
                                            <a href="#" class="center "><img src="{{$row->pic}}" width="180px"/></a>
                                        </div> 
                                        <dl class="xinxi">
                                            <dt>
                                                <a href="" class="name">{{strip_tags($row->dcr)}}</a>
                                            </dt>
                                            <dd>
                                                <span class="Price"><b>￥</b>{{$row->price}}</span>
                                                <span class="collect_Amount"><i class="iconfont icon-shoucang"><i>{{$row->collect}}</i></i></span>
                                            </dd>
                                        </dl>
                                    </div> 
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <div id="pages" style="margin-left: 50px">
                        {{$goods->render()}}
                        </div> 
                        @endif
                    </div> 
                </div> 
            </div>
        </div> 
    </div> 
</div>  
</body>
@endsection
@section('title', '我的收藏')