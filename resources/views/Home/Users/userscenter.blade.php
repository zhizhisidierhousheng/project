@extends("Home.HomePublic.public")
@section('home')
<head> 
    <script src="/static/home/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/mypage.css">
</head> 
<body>  
<!--用户中心样式--> 
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
    <!--右侧内容样式--> 
    <div class="right_style"> 
        <div class="info_content"> 
            <div class="Notice">
                <span>系统最新公告:</span>@if(count($notice) > 0){{$notice->content}}@endif
            </div> 
            <div class="user_info"> 
                <ul class=""> 
                    <li class="Order_form"><a href="/home/usersorder"><img src="/static/home/images/user_img_04.png" /><h4>订单：({{$onum}})</h4></a></li>  
                </ul> 
            </div> 
            <!--样式--> 
            <div class="user_info_p_s  clearfix"> 
                <!--订单记录--> 
                <div class="left_user_cont"> 
                    <div class="us_Orders left clearfix"> 
                        <div class="Orders_name"> 
                            <div class="title_name"> 
                                <div class="Records">购买记录</div> 
                                <div class="right select">只记录你最近30天的购买记录 </div> 
                            </div> 
                        </div> 
                        <table> 
                            <thead> 
                                <tr> 
                                    <th>商品</th> 
                                    <th>总金额</th> 
                                    <th>状态</th> 
                                    <th>操作</th> 
                                </tr> 
                            </thead> 
                            @if(count($orders) > 0)
                            <tbody> 
                                @foreach($orders as $row)
                                {{--//判断订单是否由多种商品构成--}}
                                @if(count($row->info) > 1)
                                <tr> 
                                    <td class="img_link">
                                        @foreach($row->info as $info)
                                        @if($loop->iteration == count($row->info))
                                        <a href="#" class="img" title="{{$info->gdcr}}"><img src="{{$info->gpic}}" width="80" height="80" /></a>
                                        @else
                                        <a href="#" class="img" title="{{$info->gdcr}}"><img src="{{$info->gpic}}" width="80" height="80" /></a> <i class="icon-copy"></i>
                                        @endif
                                        @endforeach
                                    </td> 
                                    <td>{{$row->total}}</td> 
                                    <td>{{$row->status}}</td> 
                                    <td><a href="#" class="View">查看</a></td> 
                                </tr> 
                                @else
                                @foreach($row->info as $info)
                                <tr> 
                                    <td class="img_link">
                                        <a href="#" class="img"><img src="{{$info->gpic}}" width="80" height="80" /></a><a href="#" class="title">{{$info->gdcr}}</a>
                                    </td>
                                    <td>{{$row->total}}</td> 
                                    <td>{{$row->status}}</td> 
                                    <td><a href="/home/usersorder/{{$info->oid}}" class="View">查看</a></td> 
                                </tr> 
                                @endforeach
                                @endif
                                @endforeach
                            </tbody> 
                            @else
                            <tbody>
                            <tr>
                                <td colspan="4"><h1>你还没有订单，快去购物吧！</h1></td>
                            </tr>
                            </tbody>
                            @endif
                        </table>
                        @if(count($orders) > 0)
                        <div id="pages" style="margin-left: 50px">
                            {{$orders->render()}}
                        </div>
                        @endif
                    </div> 
                </div> 
                <!--右侧记录样式--> 
                <div class="right_user_recording"> 
                    <div class="us_Record"> 
                        <div id="Record_p" class="Record_p"> 
                            <div class="title_name">
                                <span class="name left">广告</span>
                                <span class="pageState right"><span>0</span>/9</span>
                            </div> 
                            <div class="hd">
                                <a class="next">&lt;</a>
                                <a class="prev">&gt;</a>
                            </div> 
                            <div class="bd"> 
                                <ul> 
                                    @if(count($advs) > 0)
                                    @foreach($advs as $adv)
                                    {{--//第一条广告--}}
                                    @if($loop->iteration == 1)
                                    <li class="clone"> 
                                        <div class="p_width"> 
                                            <div class="pic">
                                                <a href=""><img src="{{$adv->pic}}" /></a>
                                            </div> 
                                            <div class="title">
                                                <a href="{{$adv->url}}">{{$adv->title}}</a>
                                            </div> 
                                            <div class="Purchase_info">
                                                <span class="p_Price">{{$adv->dcr}}</span> 
                                            </div> 
                                        </div>
                                    </li> 
                                    @else
                                        @if($loop->iteration == count($advs))
                                        {{--//最后一条广告--}} 
                                        <li class="clone"> 
                                            <div class="p_width"> 
                                                <div class="pic">
                                                    <a href=""><img src="{{$adv->pic}}" />  </a>
                                                </div> 
                                                <div class="title">
                                                    <a href="{{$adv->url}}">{{$adv->title}}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @else
                                        {{--第一与第九之间的广告--}}
                                        <li> 
                                            <div class="p_width"> 
                                                <div class="pic">
                                                    <a href=""><img src="{{$adv->pic}}" /></a>
                                                </div> 
                                                <div class="title">
                                                    <a href="{{$adv->url}}">{{$adv->title}}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </div> 
                        </div> 
                        <script type="text/javascript">jQuery("#Record_p").slide({ mainCell:".bd ul",effect:"leftLoop",vis:1,autoPlay:true });</script> 
                    </div> 
                </div> 
            </div> 
            <!--收藏商品--> 
            <div class="Collections_p"> 
                <div class="title_name">
                    收藏的商品 
                    <a href="#" class="more">更多收藏</a>
                </div> 
                <div id="Collect_Products" class="Collect_Products"> 
                    <div class="hd">
                        <a class="next">&lt;</a>
                        <a class="prev">&gt;</a>
                    </div> 
                    <div class="bd"> 
                        <ul>
                            @if(count($collect) > 0)
                            @foreach($collect as $coll)
                                @if($coll->status == 0)
                                <li> 
                                    <div class="pic">
                                        <a href="javascript:void(0)" onclick="alert('该商品已下架')"><img src="{{$coll->pic}}" /></a>
                                    </div> 
                                    <div class="title">
                                        <a href="javascript:void(0)" onclick="alert('该商品已下架')">{{$coll->name}}</a>
                                    </div> 
                                    <div class="p_Price">
                                        {{$coll->price}}
                                    </div>
                                </li>
                                @else
                                <li> 
                                    <div class="pic">
                                        <a href=""><img src="{{$coll->pic}}" /></a>
                                    </div> 
                                    <div class="title">
                                        <a href="#">{{$coll->name}}</a>
                                    </div> 
                                    <div class="p_Price">
                                        {{$coll->price}}
                                    </div>
                                </li>
                                @endif
                            @endforeach
                            @endif
                        </ul> 
                    </div> 
                </div> 
            </div>  
        </div> 
    </div>
</body>
@endsection
@section('title', '会员中心')