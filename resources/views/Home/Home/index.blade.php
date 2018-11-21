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
            <!--推荐图层样式-->
            <div class="recommend" id="adv">
                <img src="{{$adv->pic}}">
            </div>
            <script>
                $('#adv').fadeIn(3000);
                $('#adv').fadeOut(3000);
            </script>
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
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="/static/home/Products/p_1.jpg" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">新疆特产 一品玉和田大枣四星450g</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>223.12
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>123</b>件
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="/static/home/Products/p_5.jpg" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">陈克明 面条 克明面业 麦禧福面 福伴一生 五福礼盒挂面 399g*5</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>223.12
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>123</b>件
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="/static/home/Products/p_2.jpg" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">陈克明 面条 克明面业 麦禧福面 福伴一生 五福礼盒挂面 399g*5</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>223.12
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>123</b>件
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="/static/home/Products/p_3.jpg" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">陈克明 面条 克明面业 麦禧福面 福伴一生 五福礼盒挂面 399g*5</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>223.12
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>123</b>件
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="imglibk">
                                        <img src="/static/home/Products/p_3.jpg" width="160" height="160" />
                                    </a>
                                    <a href="#" class="name">陈克明 面条 克明面业 麦禧福面 福伴一生 五福礼盒挂面 399g*5</a>
                                    <div class="infostyle">
                                        <span class="Price">
                                            <b>￥</b>223.12
                                        </span>
                                        <span class="Quantity">销售：
                                            <b>123</b>件
                                        </span>
                                    </div>
                                </li>
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
                <div class="title_name">
                    <i class="iconfont icon-time"></i>限时促销
                    <a href="#">更多促销</a>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#" class="Promotions_img">
                                <img src="/static/home/Products/p_4.jpg" width="180" height="180" />
                            </a>
                            <div class="Promotions_line">
                                <a href="#" class="name">Orion 好丽友 熊猫派派福巧克力味4枚 100g/盒</a>
                                <div class="infostyle">
                                    <span class="Price">
                                        <b>￥</b>223.12
                                    </span>
                                    <span class="Original_price">￥65.00</span>
                                </div>
                                <div class="time">剩余时间：23时34分23秒</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="AD_tu">
                <a href="#">
                    <img src="/static/home/AD/ad-4.jpg" width="1200" height="120" />
                </a>
            </div>
            <!--产品类样式-->
            <div class="product_Sort">
                <div class="title_name">
                    <span class="floor">1F</span>
                    <span class="name">水果蔬菜</span>
                    <span class="link_name">
                        <a href="#">苹果</a>|
                        <a href="#">香蕉</a>|
                        <a href="#">橙子</a>|
                        <a href="#">哈密瓜</a>|
                        <a href="#">白菜</a>|
                        <a href="#">青菜</a>
                    </span>
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
                                    <li style="display: list-item;">
                                        <a href="#">
                                            <img src="/static/home/AD/ad-6.jpg" width="398" height="469">
                                        </a>
                                    </li>
                                    <li style="display: none;">
                                        <a href="#">
                                            <img src="/static/home/AD/ad-7.jpg" width="398" height="469">
                                        </a>
                                    </li>
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
                            <li>
                                <a href="#">
                                    <img src="/static/home/Products/p_1.jpg" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">Olay玉兰油 新生塑颜金纯活能水</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>123.00
                                    </span>
                                    <span class="Sales">销量
                                        <i>345</i>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/static/home/Products/p_2.jpg" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">Olay玉兰油 新生塑颜金纯活能水</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>123.00
                                    </span>
                                    <span class="Sales">销量
                                        <i>345</i>件
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/static/home/Products/p_3.jpg" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">Olay玉兰油 新生塑颜金纯活能水</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>123.00
                                    </span>
                                    <span class="Sales">销量
                                        <i>345</i>件
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/static/home/Products/p_4.jpg" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">Olay玉兰油 新生塑颜金纯活能水</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>123.00
                                    </span>
                                    <span class="Sales">销量
                                        <i>345</i>件
                                    </span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="product_Sort">
                <div class="title_name">
                    <span class="floor">2F</span>
                    <span class="name">水果蔬菜</span>
                    <span class="link_name">
                        <a href="#">苹果</a>|
                        <a href="#">香蕉</a>|
                        <a href="#">橙子</a>|
                        <a href="#">哈密瓜</a>|
                        <a href="#">白菜</a>|
                        <a href="#">青菜</a>
                    </span>
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
                                    <li style="display: list-item;">
                                        <a href="#">
                                            <img src="/static/home/AD/ad-7.jpg" width="398" height="469">
                                        </a>
                                    </li>
                                    <li style="display: none;">
                                        <a href="#">
                                            <img src="/static/home/AD/ad-8.jpg" width="398" height="469">
                                        </a>
                                    </li>
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
                            <li>
                                <a href="#">
                                    <img src="/static/home/Products/p_1.jpg" width="180px" height="160px">
                                </a>
                                <a href="#" class="p_title_name">Olay玉兰油 新生塑颜金纯活能水</a>
                                <div class="Numeral">
                                    <span class="price">
                                        <i>￥</i>123.00
                                    </span>
                                    <span class="Sales">销量
                                        <i>345</i>件
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--猜你喜欢样式-->
            <div class="like_p">
                <div class="title_name">
                    <span>猜你喜欢</span>
                </div>
                <div class="list">
                    <ul class="list_style">
                        <li class="p_info_u">
                            <a href="#" class="p_img">
                                <img src="/static/home/Products/p_13.jpg">
                            </a>
                            <a href="#" class="name">御泥坊 玫瑰滋养+红石榴亮颜美肤套装 深层补水滋润 提亮肤色</a>
                            <div class="Numeral">
                                <span class="price">
                                    <i>￥</i>123.00
                                </span>
                                <span class="Sales">销量
                                    <i>345</i>件
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@endsection
@section('title', '首页')