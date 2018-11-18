<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/static/home/css/common.css" rel="stylesheet" type="text/css">
    <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css">
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css">
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css">
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" type="text/css">
    
    <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/static/home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/static/home/js/common_js.js" type="text/javascript"></script>
    <script src="/static/home/js/footer.js" type="text/javascript"></script>
    <style>
        .auto_login{text-align:right;}
    </style>

    <title>
        验证手机号
    </title>
</head>
<body>
    <div class="Reg_log_style">
        <div class="logo">
            <a href="/index"><img src="/static/home/images/logo.png"></a>
        </div>
        <div class="login_style">
            <form id="myform" class="sign_area" autocomplete="off" name="myform" action="/doforget" method="post">
                <div class="title_name">
                    <span>验证</span>
                </div>
                <div class="login_m_1" style="height:325px;">
                    <div class="add_login">
                        <ul>
                            <li class="frame_style">
                                <label class="user_icon"></label>
                                <input name="phone" type="text" id="user_text" placeholder="手机号" maxlength="11">
                            </li>
                            <span class="ts" style="position:relative;top:-10px;height:20px;display:block;"></span>
                            <li class="frame_style">
                                <label class="Codes_icon"></label>
                                <input name="code" type="text" id="Codes_text" placeholder="输入验证码" style="width:40%" />
                                <a href="javascript:void(0)" id="yz" style="color:white;display:inline-block;background:orange;text-align:center;width:184px;">获取验证码</a>
                            </li>
                            <span class="ts" style="position:relative;top:-10px;height:20px;display:block;"></span>
                        </ul>
                        {{csrf_field()}}
                        <div class="center clearfix" style="margin-top:40px;">
                            <button class="btn_pink" id="btn_signin">下一步</button>
                        </div>
                    </div>
                    <div class="auto_login clearfix">
                        <a href="/register/create">注册</a> / <a href="/login">登录</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com Copyright © 2015-2018 商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group<br>
        </div>
    </div>
</body>
<script>  
PHONE = false;
CODE = false;
// 清除样式
$('input').focus(function(){
    $(this).parent().next('span').html(' ');
});
// 手机号验证
$('input[name=phone]').blur(function(){
    pp = $(this);
    // 获取输入的手机号
    phone = $(this).val();
    // 匹配
    if(phone.match(/^1(3|4|5|7|8)\d{9}$/) == null){
        pp.parent().next('span').css('color', 'red').html('请输入正确手机号');
        PHONE = false;
    }else{
        // 验证手机号是否存在
        $.get('/forgetphone',{phone:phone},function(data){
            if(data == 1){
                pp.parent().next('span').css('color', 'green').html('可获取验证码');
                PHONE = true;
            }else{
                pp.parent().next('span').css('color', 'red').html('未注册手机号,可前往注册');
                PHONE = false;
            }
        });
    }
});
// 获取校验码
$('#yz').click(function(){
    yz = $(this);
    // 获取输入的手机号
    p = $('input[name=phone]').val();
    // 未输入号码
    if(p == ''){
        alert('请先输入手机号码');
    }
    // Ajax
    $.get('/forgetcodeget', {p:p}, function(data){
        // 确认短信发送成功
        if (data.code == 000000) {
            // 按钮倒计时
            m = 60;
            mytime = setInterval(function(){
                m--;
                // 修改文本
                yz.html(m + '秒后可重发');
                // 按钮禁用
                yz.attr('disabled', true);
                // 按钮样式变化
                yz.css({'background':'#999', 'cursor':'default'});
                if (m == 0) {
                    // 清除定时器
                    clearInterval(mytime);
                    yz.html('重新发送');
                    // 按钮激活
                    yz.attr('disabled', false);
                    yz.css({'background':'orange', 'cursor':'pointer'});
                }
            },1000);
        }
    }, 'json');
});
// 输入校验码校验
$('input[name=code]').blur(function(){
    // 当前元素
    codes = $(this);
    // 获取输入的校验码
    code = $(this).val();
    // 校验码校验
    $.get('/forgetcheckcode', {code:code}, function(data) {
        // 确认校验信息
        if (data == 1) {
            codes.parent().next('span').css('color', 'red').html('校验码有误');
            CODE = false;
        }else if(data == 2){
            codes.parent().next('span').css('color', 'red').html('校验码不能为空');
            CODE = false;
        }else if(data == 3){
            codes.parent().next('span').css('color', 'red').html('校验码过期');
            CODE = false;
        }else{
            codes.parent().next('span').css('color', 'green').html('校验码正确');
            CODE = true;
        }
    });
});
// 表单提交处理
$("#myform").submit(function(){
    // 让input框的触发失去焦点事件 
    $("input").trigger("blur");
    // 判断所有要求都符合才能提交数据
    if(PHONE && CODE){
        return true;//提交页面
    }else{
        return false;//阻止提交
    }
});
</script>
</html>