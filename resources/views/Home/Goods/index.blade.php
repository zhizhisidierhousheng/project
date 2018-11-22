<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/static/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/static/home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/static/home/js/common_js.js" type="text/javascript"></script>
    <script src="/static/home/js/footer.js" type="text/javascript"></script>
    <!--图片放大效果-->
    <script src="/static/home/js/jqzoom.js" type="text/javascript"></script>
    <script type="text/javascript" src="/static/home/js/num-alignment.js"></script>
    <title>商品页</title>
	<style>
	#sta{position:relative;width:600px;margin:20px auto;height:24px;}
	#sta ul,#sta span{float:left;display:inline;height:19px;line-height:19px;}
	#sta ul{margin:0 10px;}
	#sta li{float:left;width:24px;cursor:pointer;text-indent:-9999px;background:url(/static/home/images/star.png) no-repeat;}
	#sta strong{color:#f60;padding-left:10px;}
	#sta li.on{background-position:0 -28px;}
	#sta p{position:absolute;top:20px;width:159px;height:60px;display:none;background:url(/static/home/images/icon.gif) no-repeat;padding:7px 10px 0;}
	#sta p em{color:#f60;display:block;font-style:normal;}
	</style>

</head>
<body>
<!--顶部样式-->
<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    @if(session('name'))
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">     欢迎你
                        {{session('name')}}
                        <a href="/login" class="red">[退出]</a>
                    </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="/order">我的订单</a>
                    </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">购物车</a>
                    </li>
                    @else
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本商城！
                        <a href="/login/create" class="red">[请登录]</a>新用户
                        <a href="/register" class="red">[免费注册]</a>
                    </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">购物车</a>
                    </li>
                    @endif

                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">联系我们</a>
                    </li>
                    <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover">
                        <a href="#" class="hd_menu">客户服务</a>
                        <div class="hd_menu_list">
                            <ul>
                                <li>
                                    <a href="#">常见问题</a></li>
                                <li>
                                    <a href="#">在线退换货</a></li>
                                <li>
                                    <a href="#">在线投诉</a></li>
                                <li>
                                    <a href="#">配送范围</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover">
                        <a href="#" class="hd_menu ">
                            <em class="iconfont icon-shouji"></em>手机版
                        </a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/static/home//static/home/images/erweima.jpg" width="100px" height="100" />
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--顶部样式1-->
    <div id="header" class="header page_style">
        <div class="logo">
            <a href="/index">
                <img src="/static/home/images/logo.png" />
            </a>
        </div>
        <!--结束图层-->
        <div class="Search">
            <p>
                <input name="" type="text" class="text" />
                <input name="" type="submit" value="搜 索" class="Search_btn" />
            </p>
        </div>
        <!--购物车样式-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart">
                <em class="iconfont icon-cart2"></em>
                <a href="#">我的购物车</a>
                <i class="ci-right">&gt;</i>
                <i class="ci-count" id="shopping-amount">0</i></div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                <ul class="p_s_list">
                    <li>
                        <div class="img">
                            <img src="/static/home/products/p_7.jpg">
                        </div>
                        <div class="content">
                            <p>
                                <a href="#">产品名称</a>
                            </p>
                            <p>颜色分类:紫花8255尺码:XL</p>
                        </div>
                        <div class="Operations">
                            <p class="Price">￥55.00</p>
                            <p>
                                <a href="#">删除</a>
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共
                        <b>1</b>件商品　共计
                        <strong>￥ 515.00</strong>
                    </div>
                    <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>
                <div class="Category">
                    <a href="#">
                        <em></em>所有产品分类
                    </a>
                </div>
                <div class="hd_allsort_out_box_new">
                    <!--左侧栏目开始-->
                    <ul class="Menu_list">
                        @foreach($data as $row)
                        <li class="name">
                            <div class="Menu_name">
                                <a href="product_list.html">{{$row->name}}</a>
                                <span>&lt;</span>
                            </div>
                            <div class="link_name"></div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                    <div class="hd_sort_list">
                                        <dl class="clearfix" data-tpc="1">
                                        @foreach($row->suv as $value)
                                            <dd>
                                                <a href="#">{{$value->name}}</a>
                                            </dd>
                                        @endforeach    
                                        </dl>
                                      
                                    </div>
                                    <div class="Brands"></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <script>$("#allSortOuterbox").slide({
                    titCell: ".Menu_list li",
                    mainCell: ".menv_Detail",
                });
            </script>
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <ul class="Navigation_name">
                    <li>
                        <a href="/index">首页</a>
                    </li>
                </ul>
            </div>
            <script>$("#Navigation").slide({
                    titCell: ".Navigation_name li"
                });
            </script>
        </div>
    </div>
</div>    
<!--产品详细页样式-->
<div class="clearfix Inside_pages">
    <div class="Location_link">
        <em></em>
        <a href="#">进口食品、进口牛</a>&gt;
        <a href="#">进口饼干/糕点</a>&gt;
        <a href="#">{{$goods->name}}</a>
    </div>
    <!--产品详细介绍样式-->
    <div class="clearfix" id="goodsInfo">
        <!--产品图片放大-->
        <div class="mod_picfold clearfix">
            <div class="clearfix" id="detail_main_img">
                <div class="layout_wrap preview">
                    <div id="vertical" class="bigImg">
                        <img src="{{$goods->pic}}" width="370px" height="380px" alt="" id="midimg" />
                        <div id="winSelector"></div>
                    </div>
                    <div class="smallImg">
                        <div class="scrollbutton smallImgUp disabled">&lt;</div>
                        <div id="imageMenu">
                            <ul>
                                <li>
                                    <img src="{{$goods->pic}}" width="68" height="68" alt="洋妞" />
                                </li>
                                @foreach($goods->pic_up as $goodsImg)
                                <li>
                                    <img src="{{$goodsImg}}" width="68" height="68" alt="{{$goods->name}}" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="scrollbutton smallImgDown">&gt;</div>
                    </div>
                    <!--smallImg end-->
                    <div id="bigView" style="display:none;">
                        <div>
                            <img width="800" height="800" alt="" src="" />
                        </div>
                    </div>
                </div>
            </div>
           	<div class="Sharing">
				<div class="Collect">
					<a href="javascript:;">
						<em class="ico1"></em>收藏商品( 2345 )
					</a>
				</div>
			</div>
        </div>
        <!--产品信息-->
        <div class="property">
            <form action="/goodsaddcart" method="get" name="ECS_FORMBUY" id="ECS_FORMBUY">
                <h2>{{$goods->name}} {{strip_tags($goods->dcr)}}</h2>
                <div class="goods_info"></div>
                <div class="ProductD clearfix">
                    <div class="productDL">
                        <dl>
                            <dt>售&nbsp;&nbsp;价：</dt>
                            <dd>
                                <span id="ECS_SHOPPRICE">
                                    <i>￥</i>{{$goods->price}}
                                </span>
                            </dd>
                        </dl>
                        <!-- <dl>
                            <dt>总 重 量：</dt>
                            <dd>140克</dd>
                        </dl> -->
                        <dl>
                            <dt>包&nbsp;&nbsp;装：</dt>
                            <dd>
                                <div class="item  selected">
                                    <b>
                                    </b>
                                    <a href="#none" title="{{$goods->package}}">{{$goods->package}}</a>
                                </div>
                            </dd>
                        </dl>
                        <dl>
	                        <dt>运&nbsp;&nbsp;费：</dt>
	                        <dd>快递包邮</dd>
	                    </dl>
                        <dl>
                            <dt>上架时间：</dt>
                            <dd>{{$goods->pro_time}}</dd>
                        </dl>
                        <div class="Appraisal">
                            <p>销售评价</p>
                            <a>{{$arr['commentTot']}}</a>
                        </div>
                    </div>
                </div>
                <div class="buyinfo" id="detail_buyinfo">
                    <dl>
                        <dt>数量</dt>
                        <dd>
                            <!-- <div class="choose-amount left">
                                <a class="btn-reduce" href="javascript:;" onclick="set_reduce()">-</a>
                                <a class="btn-add" href="javascript:;" onclick="set_add()">+</a>
                                <input class="text" id="buy_num" name="buy_num" value="1">
                            </div> -->
                            <input id="buy_num" name="buy_num" class="alignment" min="1" data_max="{{$goods->num}}" value="1" data_edit="true" />
                            <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
                            <div class="P_Quantity">剩余：{{$goods->num}}件</div>
                        </dd>
                        <dd>
                            <div class="wrap_btn">
                                <a href="javascript:void(0)" class="wrap_btn1" id="gocart" title="加入购物车"></a>
                                <a href="javascript:void(0)" class="wrap_btn2" id="gobuy" title="立即购买"></a>
                            </div>
                        </dd>
                    </dl>
                </div>
                <div class="Guarantee clearfix">
                    <dl>
                        <dt>支付方式</dt>
                        <dd>
                            <span title="暂仅支持支付宝购买"><em></em>支付宝</span>
                        </dd>
                    </dl>
					<dl>
                        <dt>服务承诺</dt>
                        <dd>
                            <p title="该商品由中国人保承保正品保障险"><em></em>正品保障</p>
                            <p title="卖家为你购买的商品投退货运费险"><em></em>赠运费险</p>
                        </dd>
                    </dl>
                </div>
            </form>
        </div>
        <!--推荐-->
        <div class="p_right_info">
            
            <div class="Recommend">
                <div class="title_name">看了又看</div>
                <div class="Recommend_list">
                    <ul>
                    @foreach($goodss as $good)
                        <li class="clearfix">
                            <div class="pic_img">
                                <a href="/homegoods/{{$good->id}}">
                                    <img src="{{$good->pic}}" data-bd-imgshare-binded="1">
                                </a>
                            </div>
                            <div class="r_content">
                                <div class="title">
                                    <a href="/homegoods/{{$good->id}}">{{$good->name}} {{strip_tags($good->dcr)}}</a>
                                </div>
                                <div class="p_Price">￥{{$good->price}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--样式-->
    <div class="clearfix">
        <div class="left_style">
          <!--   <div class="user_Records">
                <div class="title_name">用户浏览记录</div>
                <ul>
                    <li>
                        <a href="#">
                            <p>
                                <img src="Products/p_4.jpg" data-bd-imgshare-binded="1">
                            </p>
                            <p class="p_name">SanmiuSunflower新苗向日葵 乳酪夹心饼干 270g 菲律宾进口</p>
                        </a>
                        <p>
                            <span class="p_Price">
                                <i>￥</i>5.30</span>
                            <b>10.4</b>
                        </p>
                    </li>
                    <li>
                        <a href="#">
                            <p>
                                <img src="Products/p_5.jpg" data-bd-imgshare-binded="1"></p>
                            <p class="p_name">商品名称</p>
                        </a>
                        <p>
                            <span class="p_Price">
                                <i>￥</i>5.30</span>
                            <b>10.4</b>
                        </p>
                    </li>
                    <li>
                        <a href="#">
                            <p>
                                <img src="Products/p_3.jpg" data-bd-imgshare-binded="1"></p>
                            <p class="p_name">商品名称</p>
                        </a>
                        <p>
                            <span class="p_Price">
                                <i>￥</i>5.30</span>
                            <b>10.4</b>
                        </p>
                    </li>
                </ul>
            </div> -->
        </div>
        <!--介绍信息样式-->
        <div class="right_style">
            <div class="inDetail_boxOut ">
                <div class="inDetail_box">
                    <div class="fixed_out ">
                        <ul class="inLeft_btn fixed_bar">
                            <li class="active">
                                <a id="property-id" href="#shangpsx" class="current">规格与包装</a>
                            </li>
                            <li>
                                <a id="detail-id" href="#shangpjs">商品属性</a>
                            </li>
                            <li>
                                <a id="coms1-id" href="#status2">买家评论({{$arr['commentTot']}})</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="shangpsx" class="shangpsx_info">
            	<ul>
            		<li>
            			<label>生产许可编号</label>
            			<span>{{$goods->pro_num}}</span>
            		</li>
            		<li>
            			<label>配料表</label>
            			<span>{{$goods->material}}</span>
            		</li>
            		<li>
            			<label>包装方式</label>
            			<span>{{$goods->package}}</span>
            		</li>
            		<li>
            			<label>生产日期</label>
            			<span>{{$goods->pro_time}}</span>
            		</li>
            		<li>
            			<label>发货地</label>
            			<span>中国大陆</span>
            		</li>
            		<li>
            			<label>储存方式</label>
            			<span>阴凉干燥处储藏</span>
            		</li>
            	</ul>
            </div>
            <div id="shangpjs" class="info_style" style="text-align:center">
            @foreach($goods->pic_down as $goodsImgs)
                <img src="{{$goodsImgs}}" width="800px" />
            @endforeach
            </div>
            <div class="productContent" id="status2">
            	@if(empty($arr['commentTot']))
            	<div class="iComment clearfix">
                    <div class="rate">
                        <strong id="goodRate">0
                            <span>%</span>
                        </strong>
                        <br>
                        <span>好评度</span>
                    </div>
                    <div class="percent" id="percentRate">
                        <dl>
                            <dt>好评
                                <span>(0%)</span>
                            </dt>
                            <dd>
                                <div style="width:0px;"></div>
                            </dd>
                        </dl>
                        <dl>
                            <dt>中评
                                <span>(0%)</span>
                            </dt>
                            <dd class="d1">
                                <div style="width:0px;"></div>
                            </dd>
                        </dl>
                        <dl>
                            <dt>差评
                                <span>(0%)</span>
                            </dt>
                            <dd class="d1">
                                <div style="width:0px;"></div>
                            </dd>
                        </dl>
                    </div>
                    <div class="actor">
                        <dl>
                            <dt>
                                <br>只有购买过该商品的用户才能进行评价。
                            </dt>
                            <dd>
                                <input type="submit" class="Publication_btn" title="" onclick="send_cooment()" value="发表评论">
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="commentBox" style="display:none;">
                     <form action="/homegoods"  method="post" name="commentForm" id="commentForm">
                        <h3>商品评分</h3>
                        <div id="star">
                            <div id="sta">
								<ul>
									<li><input value="1"></li>
									<li><input value="2"></li>
									<li><input value="3"></li>
									<li><input value="4"></li>
									<li><input value="5"></li>
								</ul>
								<span></span>
								<p></p>
							</div>
                            <input type="hidden" name="name" value="{{session('name')}}">
                            <input type="hidden" name="id" value="{{$goods->id}}">
                        </div>
                        <h4>评论内容</h4>
                        <div class="bd">
                            {{csrf_field()}}
                            <textarea name="content" id="content" class="textarea_long" maxlength="1000" onkeyup="check(this)"></textarea>
                            <p class="g">
                                <label>&nbsp;</label>
                                <input type="submit" value="发表" class="btn_common">
                                <span t="word_calc" class="word">
                                    <b id="sy">0</b>/1000</span>
                            </p>
                        </div>
                    </form>
                </div>
                <div id="ECS_COMMENT">
                    <div class="Comment">
                        <div class="CommentTab">
                            <ul>
                                <li class="active" onclick="javascript:gotoPage(1,78,0,0);">全部评论(0)</li>
                                <li onclick="javascript:gotoPage(1,78,0,3);">好评(0)</li>
                                <li onclick="javascript:gotoPage(1,78,0,2);">中评(0)</li>
                                <li onclick="javascript:gotoPage(1,78,0,1);">差评(0)</li>
                            </ul>
                        </div>
                        <div class="CommentText" id="goodsdetail_comments_list" style="display:block">
                            <ul class="clearfix">
                            	<li>暂无评论</li>
                            </ul>
                            <div class="comment_page clearfix">
                                <div class="comment_Number">
                                    <span class="f_l f6" style="margin-right:10px;">共
                                        <b>0</b>条评论
                                    </span>
                                    <div id="comment_Pager_Number" class="comment_Pager_Number">
                                        <a href="javascript:gotoPage(1,78,0,0)">首页</a>
                                        <a class="prev" href="javascript:;">上一页</a>
                                        <a class="next" href="javascript:;">下一页</a>
                                        <a class="last" href="javascript:;">尾页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="iComment clearfix">
                    <div class="rate">
                        <strong id="goodRate">{{round($arr['goodTot']/$arr['commentTot']*100)}}
                            <span>%</span>
                        </strong>
                        <br>
                        <span>好评度</span>
                    </div>
                    <div class="percent" id="percentRate">
                        <dl>
                            <dt>好评
                                <span>({{round($arr['goodTot']/$arr['commentTot']*100)}}%)</span>
                            </dt>
                            <dd>
                                <div style="width:{{round($arr['goodTot']/$arr['commentTot']*100)}}px;"></div>
                            </dd>
                        </dl>
                        <dl>
                            <dt>中评
                                <span>({{round($arr['inTot']/$arr['commentTot']*100)}}%)</span>
                            </dt>
                            <dd class="d1">
                                <div style="width:{{round($arr['inTot']/$arr['commentTot']*100)}}px;"></div>
                            </dd>
                        </dl>
                        <dl>
                            <dt>差评
                                <span>({{round($arr['lowTot']/$arr['commentTot']*100)}}%)</span>
                            </dt>
                            <dd class="d1">
                                <div style="width:{{round($arr['lowTot']/$arr['commentTot']*100)}}px;"></div>
                            </dd>
                        </dl>
                    </div>
                    <div class="actor">
                        <dl>
                            <dt>
                                <br>只有购买过该商品的用户才能进行评价。
                            </dt>
                            <dd>
                                <input type="submit" class="Publication_btn" title="" onclick="send_cooment()" value="发表评论">
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="commentBox" style="display:none;">
                @if(session('error'))
	            {{session('error')}}
	            @endif
                    <form action="/homegoods"  method="post" name="commentForm" id="commentForm">
                        <h3>商品评分</h3>
                        <div id="star">
                            <div id="sta">
								<ul>
									<li><input value="1"></li>
									<li><input value="2"></li>
									<li><input value="3"></li>
									<li><input value="4"></li>
									<li><input value="5"></li>
								</ul>
								<span></span>
								<p></p>
							</div>
                            <input type="hidden" name="name" value="{{session('name')}}">
                            <input type="hidden" name="id" value="{{$goods->id}}">
                        </div>
                        <h4>评论内容</h4>
                        <div class="bd">
                            {{csrf_field()}}
                            <textarea name="content" id="content" class="textarea_long" maxlength="1000" onkeyup="check(this)"></textarea>
                            <p class="g">
                                <label>&nbsp;</label>
                                <input type="submit" value="发表" class="btn_common">
                                <span t="word_calc" class="word">
                                    <b id="sy">0</b>/1000</span>
                            </p>
                        </div>
                    </form>
                </div>
                <div id="ECS_COMMENT">
                    <div class="Comment">
                        <div class="CommentTab">
                            <ul>
                                <li class="active" onclick="javascript:gotoPage(1,78,0,0);">全部评论({{$arr['commentTot']}})</li>
                                <li onclick="javascript:gotoPage(1,78,0,3);">好评({{$arr['goodTot']}})</li>
                                <li onclick="javascript:gotoPage(1,78,0,2);">中评({{$arr['inTot']}})</li>
                                <li onclick="javascript:gotoPage(1,78,0,1);">差评({{$arr['lowTot']}})</li>
                            </ul>
                        </div>
                        <div class="CommentText" id="goodsdetail_comments_list" style="display:block">
                            <ul class="clearfix">
                            @foreach($comment as $com)
                            	<li>
                            		<span class="username">{{$com->name}}</span>
                            		<span class="commentC" style="color:red">{{str_repeat('★', $com->start)}}{{str_repeat('☆', 5-$com->start)}}</span>
                            		<span class="commentC">{{$com->content}}</span>
                            		<span class="commentdate">{{$com->inputtime}}</span>
                            	</li>
                            @endforeach
                            </ul>
                            <div class="comment_page clearfix">
                                <div class="comment_Number">
                                    <span class="f_l f6" style="margin-right:10px;">共
                                        <b>{{$arr['commentTot']}}</b>条评论
                                    </span>
                                    <div id="comment_Pager_Number" class="comment_Pager_Number">
                                        <a href="javascript:gotoPage(1,78,0,0)">首页</a>
                                        <a class="prev" href="javascript:;">上一页</a>
                                        <a class="next" href="javascript:;">下一页</a>
                                        <a class="last" href="javascript:;">尾页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="slogen">
    <div class="index_style">
        <ul class="wrap">
            <li>
                <a href="#">
                    <img src="/static/home/images/slogen_34.png" data-bd-imgshare-binded="1"></a>
                <b>安全保证</b>
                <span>多重保障机制 认证商城</span>
            </li>
            <li>
                <a href="#">
                    <img src="/static/home/images/slogen_28.png" data-bd-imgshare-binded="2"></a>
                <b>正品保证</b>
                <span>正品行货 放心选购</span>
            </li>
            <li>
                <a href="#">
                    <img src="/static/home/images/slogen_30.png" data-bd-imgshare-binded="3"></a>
                <b>七天无理由退换</b>
                <span>七天无理由保障消费权益</span>
            </li>
            <li>
                <a href="#">
                    <img src="/static/home/images/slogen_31.png" data-bd-imgshare-binded="4"></a>
                <b>天天低价</b>
                <span>价格更低，质量更可靠</span>
            </li>
        </ul>
    </div>
</div>
<!--底部图层-->
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number">
            <em class="iconfont icon-dianhua"></em>400-4565-345</span>
        <span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>新手上路</dt>
                <dd>
                    <a href="#">售后流程</a>
                </dd>
                <dd>
                    <a href="#">购物流程</a>
                </dd>
                <dd>
                    <a href="#">订购方式</a>
                </dd>
                <dd>
                    <a href="#">隐私声明</a>
                </dd>
                <dd>
                    <a href="#">推荐分享说明</a>
                </dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd>
                    <a href="#">保险需求测试</a>
                </dd>
                <dd>
                    <a href="#">专题及活动</a>
                </dd>
                <dd>
                    <a href="#">挑选保险产品</a>
                </dd>
                <dd>
                    <a href="#">常见问题</a>
                </dd>
            </dl>
            <dl>
                <dt>售后保障</dt>
                <dd>
                    <a href="#">保险需求测试</a>
                </dd>
                <dd>
                    <a href="#">专题及活动</a>
                </dd>
                <dd>
                    <a href="#">挑选保险产品</a>
                </dd>
                <dd>
                    <a href="#">常见问题</a>
                </dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd>
                    <a href="#">保险需求测试</a>
                </dd>
                <dd>
                    <a href="#">专题及活动</a>
                 </dd>
                <dd>
                    <a href="#">挑选保险产品</a>
                </dd>
                <dd>
                    <a href="#">常见问题</a>
                </dd>
            </dl>
            <dl>
                <dt>帮助中心</dt>
                <dd>
                    <a href="#">保险需求测试</a>
                </dd>
                <dd>
                    <a href="#">专题及活动</a>
                </dd>
                <dd>
                    <a href="#">挑选保险产品</a>
                </dd>
                <dd>
                    <a href="#">常见问题</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜
            <a href="#">公开信息披露</a>｜
            <a href="#">加入我们</a>｜
            <a href="#">联系我们</a>｜
            <a href="">友情链接</a>｜
            <a href="#">版权声明</a>｜
            <a href="#">隐私声明</a>｜
            <a href="#">网站地图</a>
        </p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
<!--右侧菜单栏购物车样式-->
<div class="fixedBox">
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user">
            <a href="#">
                <span class="fixeBoxSpan iconfont icon-yonghu"></span>
                <strong>用户</strong>
            </a>
        </li>
        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart">0</p>
            <span class="fixeBoxSpan iconfont icon-cart"></span>
            <strong>购物车</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <div class="message">购物车内暂无商品，赶紧选购吧</div>
            </div>
        </li>
        <li class="fixeBoxLi Home">
            <a href="./">
                <span class="fixeBoxSpan iconfont  icon-shoucang"></span>
                <strong>收藏</strong>
            </a>
        </li>
        <li class="fixeBoxLi Home">
            <a href="./">
                <span class="fixeBoxSpan iconfont  icon-fankui"></span>
                <strong>反馈</strong>
            </a>
        </li>
        <li class="fixeBoxLi BackToTop">
            <span class="fixeBoxSpan iconfont icon-top"></span>
            <strong>返回顶部</strong>
        </li>
    </ul>
</div>
</body>

</html>
<script type="text/javascript">
//加入购物车
$('#gocart').click(function(){
    var num = $('input[name=buy_num]').val();
    var id = $('input[name=id]').val();
    window.location.href="/goodsaddcart?id="+id+"&num="+num;
});
//立即购买
$('#gobuy').click(function(){
    var num = $('input[name=buy_num]').val();
    var id = $('input[name=id]').val();
    window.location.href="/settle?id="+id+"&num="+num;
});
// 评论星级 
	window.onload = function (){
		var osta = document.getElementById("sta");
		var aLi = osta.getElementsByTagName("li");
		var oUl = osta.getElementsByTagName("ul")[0];
		var oSpan = osta.getElementsByTagName("span")[1];
		var oP = osta.getElementsByTagName("p")[0];
		var i = iScore = ista = 0;
		var aMsg = [
					"很不满意|差得太离谱，与卖家描述的严重不符，非常不满",
					"不满意|部分有破损，与卖家描述的不符，不满意",
					"一般|质量一般，没有卖家描述的那么好",
					"满意|质量不错，与卖家描述的基本一致，还是挺满意的",
					"非常满意|质量非常好，与卖家描述的完全一致，非常满意"
					]
		
		for (i = 1; i <= aLi.length; i++){
			aLi[i - 1].index = i;
			//鼠标移过显示分数
			aLi[i - 1].onmouseover = function (){
				fnPoint(this.index);
				//浮动层显示
				oP.style.display = "block";
				//计算浮动层位置
				oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
				//匹配浮动层文字内容
				oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
			};
			
			//鼠标离开后恢复上次评分
			aLi[i - 1].onmouseout = function (){
				fnPoint();
				//关闭浮动层
				oP.style.display = "none"
			};
			
			//点击后进行评分处理
			aLi[i - 1].onclick = function (){
				ista = this.index;
				oP.style.display = "none";
				// 添加星级
				$(this).find('input').attr('name','start');
			}
		}
		
		//评分处理
		function fnPoint(iArg){
			//分数赋值
			iScore = iArg || ista;
			for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";	
		}
	};
    $('#buy_num').blur(function(){
        num = parseInt($(this).val());
        max = $(this).attr('data_max');
        min = $(this).attr('min');
        if(num > max){
            num = $(this).val(max);
        }
        if(num < min){
            num = $(this).val(min);
        }
    })
</script>
 
 <script type="text/javascript">
 $('.CommentTab ul').find('li').click(function() {
    $('.CommentTab ul').find('li').removeClass('active');
    $('.CommentText').css({
        display: 'none'
    });
    $(this).addClass('active');
    $('.CommentText').eq($(this).index()).css({
        display: 'block'
    });
});
</script>
<script language="javascript">
function updatenum(type) {
    var qty = parseInt(document.forms['ECS_FORMBUY'].elements['number'].value);
    if (type == 'del') {
        if (qty > 1) {
            document.forms['ECS_FORMBUY'].elements['number'].value = (qty - 1);
        }
    } else {
        document.forms['ECS_FORMBUY'].elements['number'].value = (qty + 1);
    }
    //changePrice();
}

function send_cooment() {
    $(".commentBox").toggle();
}

// 键盘弹起事件
function check(obj){
	//获取当前输入的字符串
	var msg = obj.value;
	//显示输入个数
	sy.innerHTML = msg.length;
}
</script>