@extends("Home.HomePublic.public")
@section("home")
<!--幻灯片样式-->
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul class="smallUl"></ul>
        </div>
        <div class="bd">
            <ul>
                <li>
                    <a href="#" target="_blank">
                        <div style="background:url(/static/home/AD/ad-1.jpg) no-repeat rgb(255, 227, 130); background-position:center; width:100%; height:460px;"></div>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <div style="background:url(/static/home/AD/ad-2.jpg) no-repeat rgb(255, 227, 130); background-position:center ; width:100%; height:460px;"></div>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <div style="background:url(/static/home/AD/ad-3.jpg) no-repeat rgb(226, 155, 197); background-position:center; width:100%; height:460px;"></div>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <div style="background:url(/static/home/AD/ad-7.jpg) no-repeat #f7ddea; background-position:center; width:100%; height:460px;"></div>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <div style="background:url(/static/home/AD/ad-6.jpg) no-repeat  #F60; background-position:center; width:100%; height:460px;"></div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>
    </div>
    <script type="text/javascript">jQuery(".slideBox").slide({
                titCell: ".hd ul",
                mainCell: ".bd ul",
                autoPlay: true,
                autoPage: true
            });</script>
        
        <!--内容样式-->
        <div class="index_style">
            <!--样式-->
            <div class="clearfix">
                <div class="news_P">
                    <div class="slideTxtBox">
                        <div class="parHd">
                            <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
                            <span class="arrow">
                                <a class="next"></a>
                                <a class="prev"></a>
                            </span>
                            <ul>
                                <li class="">最新订单</li>
                                <li class="on">商城新闻</li>
                            </ul>
                        </div>
                        <div class="parBd">
                            <ul class="Order_list">
                                <div class="picMarquee-top">
                                    <div class="hd"></div>
                                    <div class="bd">
                                        <ul>
                                            @if(count($orders) > 0)
                                            @foreach($orders as $row)
                                            <li class="clearfix">
                                                <a href="#" target="_blank" class="img_link">
                                                    <img src="{{$row->gpic}}" width="60" height="60" />
                                                </a>
                                                <a href="#" class="name">{{$row->gdcr}}</a>
                                                <h2>总价：
                                                    <b>￥{{$row->num * $row->gprice}}</b>
                                                </h2>
                                                <h4>下单时间：{{date('Y年m月日 H:i:s', $row->time)}}</h4>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <script>jQuery(".slideTxtBox .picMarquee-top").slide({
                                        mainCell: ".bd ul",
                                        autoPlay: true,
                                        effect: "topMarquee",
                                        vis: 2,
                                        interTime: 50,
                                        trigger: "click"
                                    });</script>
                            </ul>
                            <ul>
                                @if(count($notice) > 0)
                                @foreach($notice as $noce)
                                <li>
                                    <a href="javascript:;" target="_blank">{{$noce->title}}</a>
                                    <span>{{$noce->content}}</span>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <script type="text/javascript">jQuery(".slideTxtBox").slide({
                            titCell: ".parHd li",
                            mainCell: ".parBd"
                        });</script>
                </div>
                <div class="Hot_p">
                    <!--热销产品-->
                    <div class="hot_silde">
                        <div class="hd">
                            <em></em>热销产品
                            <ul></ul>
                        </div>
                        <div class="bd">
                            <ul>
                                @foreach($hotgoods as $hg)
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="{{$hg['gpic']}}" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">{{$hg['gname']}}</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>{{$hg['gprice']}}
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>{{$hg['num']}}</b>件
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a class="next" href="javascript:void(0)">&lt;</a>
                        <a class="prev" href="javascript:void(0)">&gt;</a></div>
                    <script type="text/javascript">jQuery(".hot_silde").slide({
                            titCell: ".hd ul",
                            mainCell: ".bd ul",
                            autoPage: true,
                            effect: "left",
                            autoPlay: true,
                            scroll: 4,
                            vis: 4,
                            interTime: 5000,
                            trigger: "click"
                        });</script>
                </div>
            </div>
            <!--限时促销-->
            <div class="Promotions_style">
            </div>
            <!-- 广告 -->
            <div class="AD_tu">
                <a href="{{$adv->url}}">
                    <img src="{{$adv->pic}}" width="1200" height="200" />
                </a>
            </div>
            <!--产品类样式-->
            @foreach($hotcate as $hcate)
            <div class="product_Sort">
                <div class="title_name">
                    <span class="floor">{{$loop->iteration}}F</span>
                </div>
                <div class="Section_info clearfix">
                    <div class="product_AD">
                        <div class="pro_ad_slide">
                            <div class="hd">
                                <ul>
                                    <li class="on">1</li>
                                    <li class="">2</li>
                                </ul>
                            </div>
                            <div class="bd">
                                <ul>
                                    @foreach($hcate as $hc)
                                    @if($loop->first)
                                    <li style="display: list-item;">
                                        <a href="#">
                                            <img src="{{$hc['gpic']}}" width="398" height="469">
                                        </a>
                                    </li>
                                    @endif
                                    @if($loop->last)
                                    <li style="display: none;">
                                        <a href="#">
                                            <img src="{{$hc['gpic']}}" width="398" height="469">
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <a class="prev" href="javascript:void(0)">
                                <em class="arrow"></em>
                            </a>
                            <a class="next" href="javascript:void(0)">
                                <em class="arrow"></em>
                            </a>
                        </div>
                        <script type="text/javascript">jQuery(".pro_ad_slide").slide({
                                titCell: ".hd ul",
                                mainCell: ".bd ul",
                                autoPlay: true,
                                autoPage: true,
                                interTime: 6000
                            });</script>
                    </div>
                    <!--产品列表-->
                    <div class="pro_list">
                        <ul>
                            @foreach($hcate as $goods)
                            <li>
                                <a href="#">
                                    <img src="{{$goods['gpic']}}" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">{{$goods['gname']}}</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>{{$goods['gprice']}}
                                    </span>
                                    <span class="Sales">销量
                                        <i>{{$goods['num']}}</i>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!--最新商品样式-->
            <div class="like_p">
                <div class="title_name">
                    <span>最新商品</span>
                </div>
                <div class="list">
                    <ul class="list_style">
                        @foreach($bnew as $row)
                        <li class="p_info_u">
                            <a href="#" class="p_img">
                                <img src="{{$row->pic}}">
                            </a>
                            <a href="#" class="name">{{$row->name}}</a>
                            <div class="Numeral">
                                <span class="price">
                                    <i>￥</i>{{$row->price}}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
@section('title', '首页')