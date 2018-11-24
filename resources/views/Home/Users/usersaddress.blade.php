@extends("Home.HomePublic.public")
@section('home')
<head> 

    <link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" /> 
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
    <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
    <script src="/static/home/js/jquery.sumoselect.js"></script> 
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
</head>  
<body> 
<!--用户中心收货地址--> 
<div class="user_style clearfix"> 
    <div class="user_center"> 
        <!--左侧菜单栏--> 
        <div class="left_style"> 
            <div class="menu_style"> 
                <div class="user_title">用户中心</div> 

                <div class="user_Head"> 
                    <div class="user_portrait"> 
                        <a href="/home/usersinfo" title="修改头像" class="btn_link"></a> 
                        <img src="{{$pic}}" /> 
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
                <script>
                    jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:false});
                </script> 
            </div> 
        </div> 
        <!--右侧样式--> 
        <div class="right_style" style="float:left"> 
            <div class="info_content"> 
                <!--地址管理样式--> 
                <div class="adderss_style"> 
                    <div class="title_Section">
                        <span>收货地址管理</span>
                    </div> 
                    <div class="adderss_list"> 
                        <!--地址列表--> 
                        <div class="Address_List clearfix"> 
                            <!--地址类表--> 
                            @if(count($address) > 0)
                                @foreach($address as $row)
                                <ul class="Address_info"> 
                                    <div class="address_title"> 
                                        <a href="/home/usersaddress/{{$row->id}}/edit" class="modify iconfont icon-fankui btn btn-primary" title="修改信息"></a> 地址信息@if($row->status == 0) (默认) @endif 
                                        <form action="/home/usersaddress/{{$row->id}}" method="post" id="addr_del" style="display:inline">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <a href="javascript:document.getElementById('addr_del').submit();" class="delete "><i class="iconfont icon-close2"></i></a>
                                        </form>
                                    </div> 
                                    <li>收件人：{{$row->name}}</li> 
                                    <li>收货地址：{{$row->area . $row->address}}</li> 
                                    <li>手机号：{{$row->phone}}</li> 
                                    <li>邮政编码：{{$row->postacode}}</li> 
                                </ul>
                                <script class="resources library" src="/static/home/address/area.js"></script><script>_init_area();</script>
                                @endforeach
                            @endif
                        </div>
                        <form action="/home/usersaddress" method="post" id="addr"> 
                            <div class="Add_Addresss"> 
                                <div class="title_name">
                                    <i></i>添加地址
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
                                                <script>_init_area();</script>
                                            </td> 
                                        </tr> 
                                        <tr>
                                            <td class="label_name">详细地址</td>
                                            <td>
                                                <input name="address" type="text" class="Add-text" />
                                                <i>（必填）</i>
                                            </td> 
                                            <td class="label_name">手&nbsp;&nbsp;机</td>
                                            <td>
                                                <input name="phone" type="text" class="Add-text" />
                                                <i>（必填）</i>
                                            </td> 
                                        </tr> 
                                        <tr> 
                                            <td class="label_name">收件人姓名</td>
                                            <td>
                                                <input name="name" type="text" class="Add-text" />
                                                <i>（必填）</i>
                                            </td> 
                                            <td class="label_name">邮&nbsp;&nbsp;编</td>
                                            <td>
                                                <input name="postacode" type="text" class="Add-text" value="000000" />
                                                <i>（必填）</i>
                                            </td> 
                                        </tr> 
                                        <tr>
                                            <td class="label_name"></td>
                                            <td></td>
                                            <td class="label_name"></td>
                                            <td></td> 
                                        </tr> 
                                    </tbody>
                                </table> 
                                <div class="address_Note" style="color:red">
                                    <span>注：</span>只能添加5个收货地址信息。请乎用假名填写地址，如造成损失由收货人自己承担。
                                </div>
                                <div class="btn">
                                    {{csrf_field()}}
                                    <input type="button" value="添加地址" class="Add_btn" onclick="check()">
                                </div> 
                            </div> 
                        </form>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>
<script src="/static/home/purebox/bootstrap-transition.js"></script> 
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
        code = $('input[name=postacode]').val();
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
@endsection
@section('title', '收货地址管理')