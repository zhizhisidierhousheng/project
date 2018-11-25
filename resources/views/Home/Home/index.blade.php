@extends("Home.HomePublic.public")
@section("home")

<!--幻灯片样式-->
<div id="slideBox" class="slideBox">
    <div class="hd">
        <ul class="smallUl"></ul>
    </div>

    <div class="bd">
        <ul>
            @foreach($loop as $loops)
            <li>
                <a href="" target="_blank">
                    <div style="background:url({{$loops->url}})  no-repeat;background-size:1024px 625px; background-position:center; width:100%; height:460px;"></div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <script type="text/javascript">jQuery(".slideBox").slide({
                titCell: ".hd ul",
                mainCell: ".bd ul",
                autoPlay: true,
                autoPage: true
            });</script>
    <div style="height:1000px;z-index:10000;background:red;"></div>
</div>
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
                                            <a href="/homegoods/{{$row->gid}}" target="_blank" class="img_link">
                                                <img src="{{$row->gpic}}" width="60" height="60" />
                                            </a>
                                            <a href="/homegoods/{{$row->gid}}" class="name">{{$row->gdcr}}</a>
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
                                <a href="/homegoods/{{$hg['gid']}}" class="imglibk">
                                    <img src="{{$hg['gpic']}}" width="160" height="160" />
                                </a>
                                <a href="/homegoods/{{$hg['gid']}}" class="name">{{$hg['gname']}}</a>
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
                    <a class="prev" href="javascript:void(0)">&gt;</a>
                </div>
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
            @if(!empty($adv))
            <a href="{{$adv->url}}">
                <img src="{{$adv->pic}}" width="1200" height="200" />
            </a>
            @endif
        </div>
        <!--产品类样式-->
        @if(!empty($list))
        @foreach($list as $hcate)
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
                                    <a href="/homegoods/{{$hc->id}}">
                                        <img src="{{$hc->pic}}" width="398" height="469">
                                    </a>
                                   
                                </li>

                                @endif
                                @if($loop->last)
                                <li style="display: none;">
                                    <a href="/homegoods/{{$hc->id}}">
                                        <img src="{{$hc->pic}}" width="398" height="469">
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <a class="prev" href="javascript:void(0)"><em class="arrow"></em></a>
                        <a class="next" href="javascript:void(0)"><em class="arrow"></em></a>
                    </div>
                    <script type="text/javascript">jQuery(".pro_ad_slide").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:6000});</script>
                </div>
                <!--产品列表-->
                <div class="pro_list">
                    <ul>
                        @foreach($hcate as $goods)
                        <li>
                            <a href="/homegoods/{{$goods->id}}">
                                <img src="{{$goods->pic}}" width="180px" height="160px">
                            </a>
                            <a href="/homegoods/{{$goods->id}}" class="p_title_name" title="{!!$goods->dcr!!}">{!!$goods->dcr!!}</a>
                            <div class="Numeral">
                                <span class="price">
                                    <i>￥</i>{{$goods->price}}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <!--最新商品样式-->
        <div class="like_p">
            <div class="title_name">
                <span>最新商品</span>
            </div>
            <div class="list">
                <ul class="list_style">
                    @foreach($bnew as $row)
                    <li class="p_info_u">
                        <a href="/homegoods/{{$row->id}}" class="p_img">
                            <img src="{{$row->pic}}" width="200px">
                        </a>
                        <a href="/homegoods/{{$row->id}}" class="name">{{$row->name}} {!!$row->dcr!!}</a>
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

<script>
// 去掉分类移出隐藏
    $('#allSortOuterbox').removeClass('display');
</script>
@endsection
@section('title', '淘食')