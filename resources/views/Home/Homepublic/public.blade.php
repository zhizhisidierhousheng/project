<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/static/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/static/home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/static/home/js/common_js.js" type="text/javascript"></script>
    <script src="/static/home/js/footer.js" type="text/javascript"></script>
    <title>@yield('title')</title>
</head>
    
<body>
    <!--顶部样式-->
<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <div class="Collection">下午好，欢迎光临锦宏颜！
                <em></em>
                <a href="#">收藏我们</a></div>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！
                        <a href="#" class="red">[请登录]</a>新用户
                        <a href="#" class="red">[免费注册]</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">购物车</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                        <a href="#">联系我们</a></li>
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
                                <img src="/static/home/images/erweima.jpg" width="100px" height="100" />
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
            <a href="index.html">
                <img src="/static/home/images/logo.png" />
            </a>
        </div>
        <!--结束图层-->
        <div class="Search">
            <p>
                <input name="" type="text" class="text" />
                <input name="" type="submit" value="搜 索" class="Search_btn" />
            </p>
            <p class="Words">
                <a href="#">苹果</a>
                <a href="#">香蕉</a>
                <a href="#">菠萝</a>
                <a href="#">西红柿</a>
                <a href="#">橙子</a>
                <a href="#">苹果</a>
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
                        <li class="name">
                            <div class="Menu_name">
                                <a href="product_list.html">面部护理</a>
                                <span>&lt;</span>
                            </div>
                            <div class="link_name">
                                <p>
                                    <a href="product_Detailed.html">茅台</a>
                                    <a href="#">五粮液</a>
                                    <a href="#">郎酒</a>
                                    <a href="#">剑南春</a>
                                </p>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                    <div class="hd_sort_list">
                                        <dl class="clearfix" data-tpc="1">
                                            <dt>
                                                <a href="#">面膜
                                                    <i>></i>
                                                </a>
                                            </dt>
                                            <dd>
                                                <a href="#">撕拉面膜</a>
                                                <a href="#">面膜贴</a>
                                                <a href="#">免洗面膜</a>
                                                <a href="#">水洗面膜</a>
                                            </dd>
                                        </dl>
                                      
                                    </div>
                                    <div class="Brands"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script>$("#allSortOuterbox").slide({
                    titCell: ".Menu_list li",
                    mainCell: ".menv_Detail",
                });</script>
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <ul class="Navigation_name">
                    <li>
                        <a href="product_list.html">首页</a>
                    </li>
                </ul>
            </div>
            <script>$("#Navigation").slide({
                    titCell: ".Navigation_name li"
                });</script>
        </div>
    </div>
</div>
    @section('home')
    @show
    
    <div class="slogen">
        <div class="index_style">
            <ul class="wrap">
                <li>
                    <a href="#">
                        <img src="/static/home/images/slogen_34.png" data-bd-imgshare-binded="1">
                    </a>
                    <b>安全保证</b>
                    <span>多重保障机制 认证商城</span>
                </li>
                <li>
                    <a href="#">
                        <img src="/static/home/images/slogen_28.png" data-bd-imgshare-binded="2">
                    </a>
                    <b>正品保证</b>
                    <span>正品行货 放心选购</span>
                </li>
                <li>
                    <a href="#">
                        <img src="/static/home/images/slogen_30.png" data-bd-imgshare-binded="3">
                    </a>
                    <b>七天无理由退换</b>
                    <span>七天无理由保障消费权益</span>
                </li>
                <li>
                    <a href="#">
                        <img src="/static/home/images/slogen_31.png" data-bd-imgshare-binded="4">
                    </a>
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
                <em class="iconfont icon-dianhua"></em>400-4565-345
            </span>
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
                <a href="#">版权声明</a>｜
                <a href="#">隐私声明</a>｜
                <a href="#">网站地图</a></p>
            <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
        </div>
    </div>
    <!--右侧菜单栏购物车样式-->
    <div class="fixedBox">
        <ul class="fixedBoxList">
            <li class="fixeBoxLi user">
                <a href="User.html">
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