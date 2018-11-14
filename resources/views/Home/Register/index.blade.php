<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/static/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin">

    <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript">
    </script>
    <script src="/static/home/js/jquery.reveal.js" type="text/javascript">
    </script>
    <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript">
    </script>
    <script src="/static/home/js/common_js.js" type="text/javascript">
    </script>
    <script src="/static/home/js/footer.js" type="text/javascript">
    </script>
    <title>
        用户注册
    </title>
    <style>
    /*提示信息样式*/
    .ts{color:red;display:none;}
    </style>
</head>

<body>
    <div class="Reg_log_style">
        <div class="logo">
            <a href="#">
                <img src="/static/home/images/logo.png" />
            </a>
        </div>
        <div class="regist_style">
            <div class="left_img">
                <img src="/static/home/images/bg_name_03.png" />
            </div>
            <div class="right_img">
                <img src="/static/home/images/bg_name_05.png" />
            </div>
            <form id="myform" class="sign_area" autocomplete="off" action="/login" method="post">
                <div class="title_name">
                    <span>注册</span>
                </div>
                <div class="regist_m_1">
                    <div class="add_regist">
                        <ul>
                            <li class="frame_style">
                                <label class="user_icon"></label>
                                <input name="name" type="text" id="user_text" placeholder="用户名" maxlength="8"/>
                            </li>
                            <span class="ts" style="position:relative;top:-10px;"></span>
                            <li class="frame_style">
                                <label class="password_icon"></label>
                                <input name="password" type="password" id="password" class="ywz_zhuce_kuangwenzi1 text_Password" placeholder="密码6-16位，由字母（区分大小写）、数字、下划线组成" />
                            </li>
                            <span class="ts" style="position:relative;top:-10px;"></span>
                            <div class="ywz_zhuce_xiaoxiaobao">
                                <div class="ywz_zhuce_huixian" id="pwdLevel_1">弱</div>
                                <div class="ywz_zhuce_huixian" id="pwdLevel_2">中</div>
                                <div class="ywz_zhuce_huixian" id="pwdLevel_3">强</div>
                            </div>
                            <li class="frame_style">
                                <label class="Codes_icon"></label>
                                <input name="email" type="text" id="email_text" placeholder="常用邮箱" />
                            </li>
                            <span class="ts" style="position:relative;top:-10px;"></span>
                            <li class="frame_style">
                                <label class="Codes_icon"></label>
                                <input name="phone" type="text" id="phone_text" placeholder="手机号" maxlength="11" />
                                <a class="phone_region" href="javascript:void(0)" id="yz" >获取验证码</a>
                            </li>
                            <span class="ts" style="position:relative;top:-10px;"></span>
                            <li class="frame_style">
                                <label class="Codes_icon"></label>
                                <input name="" type="text" id="Codes_text" placeholder="输入验证码" />
                            </li>
                            <span class="ts" style="position:relative;top:-10px;"></span>
                        </ul>
                        {{csrf_field()}}
                        <div class="center clearfix">
                            <button class="btn_pink" id="btn_signin">立即注册</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.welareavel.com Copyright © 2015-2018 商城网
            All Rights Reserved. Technical Support: Dgg Group
            <br>
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    // 定义跳转要求
    var yzname,yzpassword,yzemail,yzphone;
    // 正则特殊字符
    reg = /[~#^$@%&!*()<>:;'"{}【】  ]/;
    // 邮箱正则
    zemail = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
    // 手机号正则
    zphone = /^1(3|4|5|7|8)\d{9}$/;
    // 验证不过表单不跳转
    flag = false;

    // 用户名失去焦点验证
    $("#user_text").blur(function(){
        // 获取用户名文本框内容
        name = $(this).val();
        // 当前元素
        users = $(this);
       
        // 判断
        if (name == '' || name.length > 8) {
            users.parent().next('span').css('color', 'red').html('用户名不能为空,必须为1-8位的任意汉字、数字、字母或下划线').show();
            flag = false;
        }else if (reg.test(name)) {
            users.parent().next('span').css('color', 'red').html('用户名不能包含特殊字符').show();
            flag = false;
        }else{
            users.parent().next('span').css('color', 'green').html('用户名可以使用').show();            
            yzname = 1;
        }
    });
    
    // 密码失去焦点验证
    $("#password").blur(function(){
        // 获取密码框内容
        password = $(this).val();
        // 当前元素
        passwords = $(this);

        // 判断
        if (password == '' || password.length < 6 || password.length >16) {
            passwords.parent().next('span').show().html('密码不能为空,且长度为6-16位');
            flag = false;
        }else if (reg.test(password)) {
            passwords.parent().next('span').show().html('密码包含有特殊字符');
            flag = false;
        }else{
            passwords.parent().next('span').hide();
            yzpassword = 1;
        }
    });
    
    // 邮箱失去焦点验证
    $('#email_text').blur(function(){
        // 获取邮箱框内容
        email = $(this).val();
        // 当前元素
        emails = $(this);
       
        // 判断
        if (email == '') {
            emails.parent().next('span').show().html('邮箱不能为空');
            flag = false;
        }else if (!zemail.test(email)) {
            emails.parent().next('span').show().html('邮箱格式不正确');
            flag = false;
        }else{
            emails.parent().next('span').hide();
            yzemail = 1;
        }
    });

    // 手机号验证
    $('#phone_text').blur(function(){
        // 获取输入的手机号
        phone = $(this).val();
        // 当前元素
        phones = $(this);
        // 判断
        if (phone == '') {
            phones.parent().next('span').show().html('请输入手机号获取验证码');
            flag = false;
        }else if(phone.length < 11 || !zphone.test(phone)) {
            phones.parent().next('span').show().html('请输入正确的手机号码');
            flag = false;
        }else{
            phones.parent().next('span').hide();
            yzphone = 1;
        }        
    });
    
        // 获取a标签按钮点击发送验证码
        $('#yz').click(function(){
            
            $.get('/regsiter/phone', {phone:phone}, function (data) {
                alert(data);
            }, 'json');

        });

    // 表单提交
    $('#myform').submit(function () {
        // 判断所有要求都符合才能提交数据
        if (yzname == 1 && yzpassword == 1 && yzemail == 1 && yzphone == 1) {
            flag = true;
        }
        // 让input框的触发失去焦点事件
        $('input').trigger('blur');
        return flag;
    });
});
</script>
</html>