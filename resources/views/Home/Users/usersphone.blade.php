<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" /> 
<title>个人信息-更换手机</title> 
<link rel="stylesheet" type="text/css" href="/static/home/change/css/jquery.step.css" /> 
<link rel="stylesheet" type="text/css" href="/static/home/change/css/bootstrap.min.css" /> 
<script src="/static/home/change/js/jquery-1.10.2.js"></script> 
<script src="/static/home/change/js/jquery.step.min.js"></script>
<style>
.main {
    width: 600px;
    margin: 100px auto;
}
#step {
    margin-bottom: 60px;
}
</style> 
</head> 
<body> 
<div class="main"> 
    <div id="step"></div> 
</div> 
<center>
    <div style="width:800px;margin-left:400px;" id="ceto">
        <form role="form" class="form-horizontal">
            <div class="form-group" id="one">
                <label class="col-sm-2 control-label">手机号码：</label>
                <div class="col-sm-4">
                    <input class="form-control" id="phone" type="text" placeholder="请输入手机号">
                </div>
            </div>
            <span style="margin-left:-350px;display:block;margin-bottom:15px;color:red" id="msgo"></span>
            <div class="form-group" id="two">
                <label class="col-sm-2 control-label">验证码：</label>
                <div class="col-sm-2">
                    <input class="form-control" id="code" type="text">
                </div>
                <button type="button" class="btn btn-success" style="margin-left:-400px" id="send">获取验证码</button>
            </div>
            <span style="margin-left:-430px;display:block;margin-bottom:15px;color:red" id="msgt"></span>
            <div class="form-group">
                <div class="col-sm-7">
                    <button type="button" class="btn btn-primary btn-lg" id="nextBtn">确定</button>
                </div>
            </div>
        </form>
    </div>
    <div id="cett" style="display:none;margin-bottom:20px;">
        <h1>成功绑定新手机号码，请重新登录！！！</h1>
        <a href="/login" class="btn btn-success btn-lg">返回登录</a>
    </div>
</center>
<script type="text/javascript">
bool = false;
$('#phone').blur(function(){
    reg = /^1[34578]\d{9}$/;
    if ($(this).val() == '') {
        bool = false;
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('手机号码不能为空！！！');
    } else if (!reg.test($(this).val())) {
        bool = false;
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('手机号码格式不正确！！！');
    } else {
        bool = true;
        $('#one').removeClass('has-error');
        $('#one').addClass('has-success');
        $('#msgo').html('');
    }
});

$('#send').click(function(){
    if (bool) {
        phone = $('#phone').val();
        $.get('/home/myphone/code', {phone:phone}, function(data) {
            if (data.code == 000000) {
                n = 60;
                timmer = setInterval(function () {
                    n --;
                    $('#send').html('重新发送(' + n +')');
                    $('#send').attr("disabled", "disabled");
                    if (n == 0) {
                        $('#send').html('重新发送');
                        $("#send").attr("disabled", false);
                        clearInterval(timmer);
                    }
                }, 1000);
            } else if (data.msg == 1) {
                $('#one').addClass('has-error');
                $('#one').removeClass('has-success');
                $('#msgo').html('该手机号已被绑定！！！');
            }
        }, 'json');
    } else {
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('请确保您所输入的手机号正确！！！');
    }
});

$('#code').blur(function(){
    code = $(this).val();
    $.get('/home/myphone/checkcode', {code:code}, function(data) {
        if (data == 1) {
            $('#two').addClass('has-error');
            $('#two').removeClass('has-success');
            $('#msgt').html('验证码有误！！！');
        } else if (data == 2) {
            $('#two').addClass('has-error');
            $('#two').removeClass('has-success');
            $('#msgt').html('请输入验证码！！！');
        } else if (data == 3) {
            $('#two').addClass('has-error');
            $('#two').removeClass('has-success');
            $('#msgt').html('验证码已过期！！！');
        } else {
            $('#two').addClass('has-success');
            $('#two').removeClass('has-error');
            $('#msgt').html('');
            $("#nextBtn").on("click", function() {
                newphone = $('#phone').val();
                $.get('/home/myphone/change', {phone:newphone}, function (data){
                    if (data.msg == 1) {
                        $step.nextStep();
                        $('#ceto').css('display', 'none');
                        $('#cett').css('display', 'block');
                    } else {
                        alert('修改失败');
                    }
                }, 'json');
            });
        }
    });
});

var $step = $("#step");
$step.step({
    index: 0,
    time: 500,
    title: ["输入新绑定手机号", "完成"]
});
</script>  
</body>
</html>