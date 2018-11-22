@extends("Home.HomePublic.public")
@section('home')
 <head> 
  <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
  <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
  <script src="/static/home/js/jquery.reveal.js" type="text/javascript"></script> 
  <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
  <script src="/static/home/js/lrtk.js" type="text/javascript"></script>
  <link rel="stylesheet" href="/mypage.css">
 </head>  
 <body> 
  <!--产品列表样式--> 
  <div class="Inside_pages clearfix"> 
   <!--位置--> 
   <div class="Location_link"> 
    <em></em>
    @if($str == 'lb')
    <a href="javascript:;" style="cursor:default">{{$pcate}}</a> &gt; 
    <a href="/home/goodslist/{{$gcate->id}}">{{$gcate->name}}</a> 
    @endif
    @if($str == 'mh')
    <span>关键词搜索：{{$keyword}}</span>
    @endif
   </div> 
   <!--样式--> 
   <div class="scrollsidebar side_green clearfix" id="scrollsidebar"> 
    <div class="show_btn" id="rightArrow">
     <span></span>
    </div> 
    <!--左侧样式--> 
    <div class="page_left_style side_content"> 
     <div class=" side_list"> 
      @if($str == 'lb')
      <!--销售排行--> 
      <div class="pro_ranking"> 
       <div class="title_name">
        <em></em>销量排行
       </div> 
       <div class="ranking_list"> 
        <ul id="tabRank">
         @foreach($hot as $row)
         @if($loop->first)
         <li class="t_p on"> <em class="icon_ranking">{{$loop->iteration}}</em> 
          <dt>
           <h3><a href="#">{{$row['gname']}}</a></h3>
          </dt> 
          <dd class="clearfix"> 
           <a href="#"><img src="{{$row['gpic']}}" width="90" height="90" /></a> 
           <span class="Price">￥{{$row['gprice']}}</span> 
          </dd>
         </li>
         @else 
         <li class="t_p"> <em class="icon_ranking">{{$loop->iteration}}</em> 
          <dt>
           <h3><a href="#">{{$row['gname']}}</a></h3>
          </dt> 
          <dd class="clearfix">
           <a href="#"><img src="{{$row['gpic']}}" width="90" height="90" /></a> 
           <span class="Price">￥{{$row['gprice']}}</span> 
          </dd>
         </li>
         @endif
         @endforeach
        </ul> 
       </div> 
      </div> 
      @endif
      <script type="text/javascript">
    jQuery("#tabRank li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });
    jQuery("#tabRank").slide({ titCell:"dt h3",autoPlay:false,effect:"left",delayTime:300 });
    </script> 
     </div> 
    </div> 
    <script type="text/javascript"> 
$(function() { 
    $("#scrollsidebar").fix({
        float : 'left',
        //minStatue : true,
        skin : 'green', 
        durationTime : 600
    });
});
</script> 
   <div class="page_right_style">
    <div id="Sorted" >
     <!--产品列表样式--> 
     <div class="p_list  clearfix"> 
      <ul>
       @foreach($list as $row)
       <li class="gl-item">
        <div class="Borders"> 
         <div class="img">
          <a href="Product_Detailed.html"><img src="{{$row->pic}}" style="width:220px;height:220px" /></a>
         </div> 
         <div class="Price">
          <b>&yen;{{$row->price}}</b>
         </div> 
         <div class="name">
          <a href="Product_Detailed.html">{{$row->name}}</a>
         </div> 
         <div class="p-operate"> 
          <form action="/home/userscollect" id="collect{{$row->id}}" style="display:inline" method="post">
          <input type="hidden" value="{{$row->id}}" name="gid">
          {{csrf_field()}}
          <a href="javascript:document.getElementById('collect{{$row->id}}').submit();" class="p-o-btn Collect"><em></em>收藏</a>
          </form>
          <a href="/cart/{{$row->id}}" class="p-o-btn shop_cart"><em></em>加入购物车</a> 
         </div> 
        </div>
       </li>
       @endforeach
      </ul> 
      <div id="pages" style="margin-left: 50px"> 
      {{$list->render()}}
      </div> 
     </div> 
    </div> 
   </div> 
  </div>  
 </body>
@endsection
@section('title', '商品列表页')