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
    <style>
    /*提示信息样式*/
	.mation{text-align:center;line-height:40px;font-size:20px;}
    .ts{color:red;display:block;position:relative;top:-10px;height:40px;}
	/*隐藏密码*/
	ul li .invisible {
		width:40px;
		height:40px;
		position:absolute;
		right:0;
		background-image: url(/static/home/images/hide.jpg);
		background-repeat:no-repeat; 
		background-size:100% 100%;
		-moz-background-size:100% 100%;
	}
	/*显示密码*/
	ul li .visible {
		width:40px;
		height:40px;
		position:absolute;
		right:0;
		background-image: url(/static/home/images/display.jpg);
		background-repeat:no-repeat;
		background-size:100% 100%;
		-moz-background-size:100% 100%;
	}
    </style>
    <title>
        重置密码
    </title>
</head>

<body>
    <div class="Reg_log_style">
        <div class="logo">
            <a href="/index">
                <img src="/static/home/images/logo.png" />
            </a>
        </div>
        <div class="regist_style">
            <form id="myform" class="sign_area" autocomplete="off" action="/reset" method="post">
                <div class="title_name">
                    <span>重置</span>
                </div>
                <div class="regist_m_1">
                    <div class="add_regist">
                        <ul>
                        	<div class="mation">当前修改密码用户: <span style="color:orange;">{{$info->name}}</span></div>
                            <li class="frame_style">
                                <label class="password_icon"></label>
                                <input name="password" type="password" id="password" class="ywz_zhuce_kuangwenzi1 text_Password" placeholder="新密码由6-16位，由字母、数字、下划线组成"/>
                                <a href="#" id="passwordeye" class="invisible" onclick="switchPwd()"></a>
                            </li>
                            <span class="ts"></span>
                            <div class="ywz_zhuce_xiaoxiaobao">
                                <div class="ywz_zhuce_huixian" id="pwdLevel_1">弱</div>
                                <div class="ywz_zhuce_huixian" id="pwdLevel_2">中</div>
                                <div class="ywz_zhuce_huixian" id="pwdLevel_3">强</div>
                            </div>
                        </ul>
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$info->id}}">
                        <div class="center clearfix">
                            <button class="btn_pink" id="btn_signin">提交</button>
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
	// 表单提交
	flag = false;
	// 正则特殊字符
    reg = /[~#^$@%&!*()<>:;'"{}【】  ]/;
	// 清除样式
	$('input').focus(function(){
		$(this).parent().next('span').html('');
	});
 	// 密码失去焦点验证
    $("#password").blur(function(){
        // 获取密码框内容
        password = $(this).val();
        // 当前元素
        passwords = $(this);

        // 判断
        if (password == '' || password.length < 6 || password.length >16) {
            passwords.parent().next('span').html('密码不能为空,且长度为6-16位');
            flag = false;
        }else if (reg.test(password)) {
            passwords.parent().next('span').html('密码不能包含有特殊字符');
            flag = false;
        }else{
            passwords.parent().next('span').html(' ');
            flag = true;
        }
    });
    $('#myform').submit(function(){
    	return flag;
    });
    // 密码显示隐藏
	function switchPwd() {
		// 图片切换按钮
		var passwordeye = $('#passwordeye');
		// 密码框
		var showPwd = $("#password");
		// 判断class名是否存在
		if(passwordeye.hasClass('invisible')){ 
		   passwordeye.removeClass('invisible').addClass('visible');//密码可见
		   // 把密码框type切换
		   showPwd.prop('type','text');
		}else{
		   passwordeye.removeClass('visible').addClass('invisible');//密码不可见
		   // 把密码框切换
		   showPwd.prop('type','password');
		};
	}
</script>
</html>