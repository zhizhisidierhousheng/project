<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/static/home/css/common.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
  <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
  <script src="/static/home/js/jquery.sumoselect.js"></script> 
  <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
  <script src="/static/home/js/common_js.js" type="text/javascript"></script> 
  <script src="/static/home/js/footer.js" type="text/javascript"></script>
  <title>收货地址管理</title> 
  <script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
 </head>  
 <!--[if IE]>
        <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]--> 
 <body> 
  <!--顶部样式--> 
  <div id="header_top"> 
   <div id="top"> 
    <div class="Inside_pages"> 
     <div class="Collection">
      下午好，欢迎光临锦宏颜！
      <em></em>
      <a href="#">收藏我们</a>
     </div> 
     <div class="hd_top_manu clearfix"> 
      <ul class="clearfix"> 
       <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li> 
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的订单</a></li> 
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车</a> </li> 
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li> 
       <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a> 
        <div class="hd_menu_list"> 
         <ul> 
          <li><a href="#">常见问题</a></li> 
          <li><a href="#">在线退换货</a></li> 
          <li><a href="#">在线投诉</a></li> 
          <li><a href="#">配送范围</a></li> 
         </ul> 
        </div> </li> 
       <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a> 
        <div class="hd_menu_list erweima"> 
         <ul> 
          <h4 style="text-align:center; color:#6C6; font-size:14px; font-family:'Microsoft YaHei'">商城手机微信</h4> 
          <img src="/static/home/images/erweima.jpg" width="100px" height="100" /> 
         </ul> 
        </div> </li> 
      </ul> 
     </div> 
    </div> 
   </div> 
   <!--顶部样式1--> 
   <div id="header" class="header page_style"> 
    <div class="logo">
     <a href="index.html"><img src="/static/home/images/logo.png" /></a>
    </div> 
    <!--结束图层--> 
    <div class="Search"> 
     <p><input name="" type="text" class="text" /><input name="" type="submit" value="搜 索" class="Search_btn" /></p> 
     <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p> 
    </div> 
    <!--购物车样式--> 
    <div class="hd_Shopping_list" id="Shopping_list"> 
     <div class="s_cart">
      <em class="iconfont icon-cart2"></em>
      <a href="#">我的购物车</a> 
      <i class="ci-right">&gt;</i>
      <i class="ci-count" id="shopping-amount">0</i>
     </div> 
     <div class="dorpdown-layer"> 
      <div class="spacer"></div> 
      <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>--> 
      <ul class="p_s_list"> 
       <li> 
        <div class="img">
         <img src="/static/home/products/p_7.jpg" />
        </div> 
        <div class="content">
         <p><a href="#">产品名称</a></p>
         <p>颜色分类:紫花8255尺码:XL</p>
        </div> 
        <div class="Operations"> 
         <p class="Price">￥55.00</p> 
         <p><a href="#">删除</a></p>
        </div> </li> 
      </ul> 
      <div class="Shopping_style"> 
       <div class="p-total">
        共
        <b>1</b>件商品　共计
        <strong>￥ 515.00</strong>
       </div> 
       <a href="#" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a> 
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
       <a href="#"><em></em>所有产品分类</a>
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
          <p><a href="Product_Detailed.html">茅台</a> <a href="#">五粮液</a> <a href="#">郎酒</a> <a href="#">剑南春</a></p> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
           <div class="hd_sort_list"> 
            <dl class="clearfix" data-tpc="1"> 
             <dt>
              <a href="#">面膜<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#">撕拉面膜</a>
              <a href="#">面膜贴</a>
              <a href="#">免洗面膜</a>
              <a href="#">水洗面膜</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="2"> 
             <dt>
              <a href="#">洁面<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#">洁面摩丝</a>
              <a href="#">洁面乳 </a>
              <a href="#">洁面啫哩/胶</a>
              <a href="#">面部去角质/磨砂</a>
              <a href="#">洁面膏/霜</a>
              <a href="#">洁肤皂</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="3"> 
             <dt>
              <a href="#">化妆水<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 喷雾</a>
              <a href="#"> 精华水</a>
              <a href="#"> 柔肤水</a>
              <a href="#">爽肤水</a>
              <a href="#">收敛水/紧肤水</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="4"> 
             <dt>
              <a href="#">眼部护理<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 眼膜</a>
              <a href="#"> 眼部凝胶</a>
              <a href="#">眼部精华</a>
              <a href="#">眼霜</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="4"> 
             <dt>
              <a href="#">眼部护理<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 眼膜</a>
              <a href="#"> 眼部凝胶</a>
              <a href="#">眼部精华</a>
              <a href="#">眼霜</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="4"> 
             <dt>
              <a href="#">防晒<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 眼膜</a>
              <a href="#"> 眼部凝胶</a>
              <a href="#">眼部精华</a>
              <a href="#">眼霜</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="4"> 
             <dt>
              <a href="#">唇部护理<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 眼膜</a>
              <a href="#"> 眼部凝胶</a>
              <a href="#">眼部精华</a>
              <a href="#">眼霜</a>
             </dd> 
            </dl> 
            <dl class="clearfix" data-tpc="4"> 
             <dt>
              <a href="#">乳液/面霜<i>&gt;</i></a>
             </dt> 
             <dd>
              <a href="#"> 乳液</a>
              <a href="#"> 面霜</a>
              <a href="#">按摩霜</a>
              <a href="#">面部啫喱</a>
              <a href="#">凝露/凝胶</a>
             </dd> 
            </dl> 
           </div>
           <div class="Brands"> 
            <a href="#" class="logo_Brands"><img src="" /></a> 
           </div> 
          </div> 
          <!--品牌--> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">身体护理</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="Product_Detailed.html"> 面霜</a>
          <a href="#">眼霜</a>
          <a href="#"> 面膜</a>
          <a href="#">护肤套装</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">香水彩妆</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">卸妆 </a>
          <a href="#">防晒</a>
          <a href="#">BB</a> 
          <a href="#">女士香水</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">洗发护发</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">洗发</a>
          <a href="#">护发</a>
          <a href="#">沐浴</a>
          <a href="#">润肤乳</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">女性护理</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">洁面</a>
          <a href="#">坚果炒货</a>
          <a href="#">乳液</a> 
          <a href="#"> 面霜</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">男性护理</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">洁面</a>
          <a href="#">坚果炒货</a>
          <a href="#">乳液</a> 
          <a href="#"> 面霜</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">推荐品牌</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">欧莱雅</a>
          <a href="#"> 菲诗小铺</a>
          <a href="#"> 雅诗兰黛</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
        <li class="name"> 
         <div class="Menu_name">
          <a href="#">推荐品牌</a>
          <span>&lt;</span>
         </div> 
         <div class="link_name"> 
          <a href="#">欧莱雅</a>
          <a href="#"> 菲诗小铺</a>
          <a href="#"> 雅诗兰黛</a> 
         </div> 
         <div class="menv_Detail"> 
          <div class="cat_pannel clearfix"> 
          </div> 
         </div> </li> 
       </ul> 
      </div> 
     </div> 
     <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail", });</script> 
     <!--菜单栏--> 
     <div class="Navigation" id="Navigation"> 
      <ul class="Navigation_name"> 
       <li><a href="#">首页</a></li> 
       <li><a href="#">水果蔬菜</a></li> 
       <li><a href="#">限时特卖</a><em class="hot_icon"></em></li> 
       <li><a href="#">联系我们</a></li> 
       <li><a href="#">鲜盟人才</a></li> 
       <li><a href="#">鲜盟金融</a></li> 
       <li><a href="#">鲜盟投资</a></li> 
       <li><a href="#">鲜盟股票</a></li> 
      </ul> 
     </div> 
     <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script> 
     <!-- <a href="#" class="link_bg"><img src="/static/home/images/link_bg_03.png" /></a>--> 
    </div> 
   </div> 
  </div> 
  <!--用户中心收货地址--> 
  <div class="user_style clearfix"> 
   <div class="user_center"> 
    <!--左侧菜单栏--> 
    <div class="left_style"> 
     <div class="menu_style"> 
      <div class="user_title">
       用户中心
      </div> 
      <div class="user_Head"> 
       <div class="user_portrait"> 
        <a href="/home/usersinfo" title="修改头像" class="btn_link"></a> 
        <img src="{{$pic}}" /> 
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
          <li> <a href="user.php?act=bonus">优惠券</a></li> 
         </ul> 
        </dd> 
       </dl> 
       <dl class="accountSideOption1"> 
        <dt class="transaction_manage">
         <em class="icon_4"></em>安全中心
        </dt> 
        <dd> 
         <ul> 
          <li> <a href="user.php?act=myshop">密保设置</a></li> 
         </ul> 
        </dd> 
       </dl> 
      </div> 
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:false});</script> 
     </div> 
    </div> 
    <!--右侧样式--> 
    <div class="right_style"> 
     <div class="info_content"> 
      <!--地址管理样式--> 
      <div class="adderss_style"> 
       <div class="title_Section">
        <span>收货地址管理</span>
       </div> 
       <div class="adderss_list"> 
        <!--地址列表--> 
        <div class="Address_List clearfix"> 
         
        </div> 
       </div> 
       <form action="/home/usersaddress/{{$data->id}}" method="post" id="addr"> 
        <div class="Add_Addresss"> 
         <div class="title_name">
          <i></i>修改地址
         </div> 
         <table> 
          <tbody>
           <tr> 
            <td class="label_name">收货区域</td> 
            <td colspan="3" class="select">
            <label> 省份 </label>
            <select class="kitjs-form-suggestselect " id="s_province" name="s_province"></select>
            <label> 市/县 </label>
            <select class="kitjs-form-suggestselect " id="s_city" name="s_city"></select>
            <label> 区/县 </label><select class="kitjs-form-suggestselect" id="s_county" name="s_county"></select>
            <script class="resources library" src="/static/home/address/area.js"></script>
            <script>
            var opt0 = ["{{$province}}","{{$city}}","{{$county}}"];
            _init_area();
            </script>
            </td> 
           </tr> 
           <tr>
            <td class="label_name">详细地址</td>
            <td><input name="address" type="text" class="Add-text" value="{{$data->address}}" /><i>（必填）</i></td> 
            <td class="label_name">手&nbsp;&nbsp;机</td>
            <td><input name="phone" type="text" class="Add-text" value="{{$data->phone}}" /><i>（必填）</i></td> 
           </tr> 
           <tr> 
            <td class="label_name">收件人姓名</td>
            <td><input name="name" type="text" class="Add-text" value="{{$data->name}}" /><i>（必填）</i></td> 
            <td class="label_name">邮&nbsp;&nbsp;编</td>
            <td><input name="code" type="text" class="Add-text" value="000000" /><i>（必填）</i></td> 
           </tr> 
           <tr>
            <td class="label_name">是否选为默认地址</td>
            <td><input type="checkbox" value="0" name="status" @if($data->status == 0) checked @endif /></td>
            <td class="label_name"></td>
            <td></td> 
           </tr> 
           <tr>
            <td class="label_name"></td>
            <td></td>
            <td class="label_name"></td>
            <td></td> 
           </tr> 
          </tbody>
         </table> 
         <div class="btn">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <input type="button" value="确认修改" class="Add_btn" onclick="check()">
         </div> 
        </div> 
       </form>
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="slogen"> 
   <div class="index_style"> 
    <ul class="wrap"> 
     <li> <a href="#"><img src="/static/home/images/slogen_34.png" data-bd-imgshare-binded="1" /></a> <b>安全保证</b> <span>多重保障机制 认证商城</span> </li> 
     <li><a href="#"><img src="/static/home/images/slogen_28.png" data-bd-imgshare-binded="2" /></a> <b>正品保证</b> <span>正品行货 放心选购</span> </li> 
     <li> <a href="#"><img src="/static/home/images/slogen_30.png" data-bd-imgshare-binded="3" /></a> <b>七天无理由退换</b> <span>七天无理由保障消费权益</span> </li> 
     <li> <a href="#"><img src="/static/home/images/slogen_31.png" data-bd-imgshare-binded="4" /></a> <b>天天低价</b> <span>价格更低，质量更可靠</span> </li> 
    </ul> 
   </div> 
  </div> 
  <!--底部图层--> 
  <div class="phone_style"> 
   <div class="index_style"> 
    <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span>
    <span class="phone_title">客服热线 7X24小时 贴心服务</span> 
   </div> 
  </div> 
  <div class="footerbox clearfix"> 
   <div class="clearfix"> 
    <div class=""> 
     <dl> 
      <dt>
       新手上路
      </dt> 
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
       <a href="#">隐私声明 </a>
      </dd> 
      <dd>
       <a href="#">推荐分享说明 </a>
      </dd> 
     </dl> 
     <dl> 
      <dt>
       配送与支付
      </dt> 
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
       <a href="#">常见问题 </a>
      </dd> 
     </dl> 
     <dl> 
      <dt>
       售后保障
      </dt> 
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
       <a href="#">常见问题 </a>
      </dd> 
     </dl> 
     <dl> 
      <dt>
       支付方式
      </dt> 
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
       <a href="#">常见问题 </a>
      </dd> 
     </dl> 
     <dl> 
      <dt>
       帮助中心
      </dt> 
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
       <a href="#">常见问题 </a>
      </dd> 
     </dl> 
    </div> 
   </div> 
   <div class="text_link"> 
    <p> <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p> 
    <p>蜀ICP备11017033号 Copyright &copy;2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p> 
   </div> 
  </div> 
  <script src="/static/home/purebox/bootstrap-transition.js"></script> 
  <!-- <script src="/static/home/purebox/application.js"></script>  -->
  <script src="/static/home/purebox/bootstrap-alert.js"></script> 
  <script src="/static/home/purebox/bootstrap-modal.js"></script> 
  <script src="/static/home/purebox/bootstrap-dropdown.js"></script> 
  <script src="/static/home/purebox/bootstrap-scrollspy.js"></script> 
  <script src="/static/home/purebox/bootstrap-tab.js"></script> 
  <script src="/static/home/purebox/bootstrap-tooltip.js"></script> 
  <script src="/static/home/purebox/bootstrap-popover.js"></script> 
  <script src="/static/home/purebox/bootstrap-button.js"></script> 
  <script src="/static/home/purebox/bootstrap-collapse.js"></script> 
  <script src="/static/home/purebox/bootstrap-carousel.js"></script> 
  <script src="/static/home/purebox/bootstrap-typeahead.js"></script> 
  <script src="/static/home/purebox/bootstrap-affix.js"></script> 
  <script src="/static/home/purebox/holder/holder.js"></script> 
  <script src="/static/home/purebox/google-code-prettify/prettify.js"></script> 
  <script src="/static/home/purebox/jquery.purebox.js"></script> 
  <script src="/static/home/purebox/jquery.resizable.js"></script>
 </body>
<script>
  function check()
  {
      code = $('input[name=code]').val();
      phone = $('input[name=phone]').val();
      name = $('input[name=name]').val();
      area = $('#s_province').val() + $('#s_city').val() + $('#s_county').val();
      address = $('input[name=address]').val();
      bool = false;

      creg = /^[0-9][0-9]{5}$/;
      preg = /^1[34578]\d{9}$/;
      areg = /^([\u4e00-\u9fa5]+(省|自治区|市))?[\u4e00-\u9fa5]+(市|区|州)[\u4e00-\u9fa5]+(区|县|镇)$/;
      if (phone == '' || address == '' || name == '') {
          alert('收件人姓名、手机号码、详细地址、邮政编码不能为空');
      } else if (!creg.test(code)) {
          alert('邮政编码不正确');
      } else if (!preg.test(phone)) {
          alert('手机号码格式不正确');
      } else if (!areg.test(area)) {
          alert('地址格式不正确');
      } else if ($('.Address_info').length > 5) {
          alert('最多只能添加5个收货地址');
      } else {
          bool = true;
      }
      
      if (bool) {
          $('#addr').submit();
      }
  }
</script>
</html>