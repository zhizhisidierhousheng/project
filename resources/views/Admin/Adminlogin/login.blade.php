<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">

    <link href="/static/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css">
    
    <title>
        后台登录 - 淘食
    </title>
</head>
<body>
    
    <div class="header">LOGIN</div>
    <div class="loginWraper">
        <div class="loginError">
            @if(session('error'))
            {{session('error')}}
            @endif
        </div>
        <div id="loginform" class="loginBox">
            <form class="form form-horizontal" action="/adminlogin" method="post">
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont"></i></label>
                    <div class="formControls col-xs-8">
                        <input id="name" name="name" type="text" placeholder="账户" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont"></i></label>
                    <div class="formControls col-xs-8">
                        <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3 ">
                        <input class="input-text size-L" type="text"  placeholder="验证码" style="width:150px;" name="captcha" autocomplete="off"> 
                        <!-- 验证码 -->
                        <img src="{{ URL('adminlogin/captcha/1') }}"   title="点击图片重新获取验证码" id="c2c98f0de5a04167a9e427d883690ff6" onclick="javascript:re_captcha();"><br>
                        <span id="kanbuq" >点击图片重新获取验证码</span>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;"> <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        Copyright ©2018-2018 welaravel.com 所有
    </div>
<script>  
    // 刷新验证码方法
    function re_captcha() {
    $url = "{{ URL('adminlogin/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }
</script>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>

</body>
</html>