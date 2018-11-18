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
        .error{text-align:center;height:40px;font-size:20px;}
    </style>

    <title>
        用户登录
    </title>
</head>
<body>
    <div class="Reg_log_style">
        <div class="logo">
            <a href="/index"><img src="/static/home/images/logo.png"></a>
        </div>
        <div class="login_style">
            <div class="left_img">
                <img src="/static/home/images/bg_name_03.png">
            </div>
            <div class="right_img">
                <img src="/static/home/images/bg_name_05.png">
            </div>
            <form id="myform" class="sign_area" autocomplete="off" name="myform" action="/login" method="post">
                <div class="title_name">
                    <span>登录</span>
                </div>
                <div class="login_m_1" >
                <div class="error">
                    @if(session('error'))
                    <span style="color:red">{{session('error')}}</span>
                    @endif
                    @if(session('success'))
                    <span style="color:green">{{session('success')}}</span>
                    @endif
                </div>
                    <div class="add_login">
                        <ul>
                            <li class="frame_style">
                                <label class="user_icon"></label>
                                <input name="name" type="text" id="user_text" placeholder="用户名/手机号">
                            </li>
                            
                            <li class="frame_style">
                                <label class="password_icon"></label>
                                <input name="password" type="password" id="password" placeholder="密码">
                            </li>
                            <li class="frame_style" >
                                <div id="code">
                                    <input class="code" type="text"  placeholder="验证码" style="width:205px;position:absolute" name="captcha" autocomplete="off"> 
                                    <!-- 验证码 -->
                                    <img src="{{ URL('login/captcha/1') }}"   title="点击图片重新获取验证码" id="c2c98f0de5a04167a9e427d883690ff6" onclick="javascript:re_captcha();" style="position:absolute;right:3px;"><br>
                                </div>
                            </li>
                            
                        </ul>
                        <div class="auto_login clearfix">
                            <a href="/register/create">立即注册</a> / 
                            <a href="/forget">忘记密码？</a>
                        </div>
                        {{csrf_field()}}
                        <div class="center clearfix" style="margin-top:40px;">
                            <button class="btn_pink" id="btn_signin">立即登录</button>
                        </div>
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
    // 刷新验证码方法
    function re_captcha() {
    $url = "{{ URL('login/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }
    // 错误提示清空
    $('input').focus(function () {
        $('.error').html('');
    });
</script>
</html>