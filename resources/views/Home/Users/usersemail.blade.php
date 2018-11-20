<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" /> 
<title>个人信息-更换邮箱</title> 
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
    <div style="width:800px;margin-left:260px;" id="ceto">
        <form role="form" class="form-horizontal">
            <div class="form-group" id="one">
                <label class="col-sm-2 control-label">邮箱：</label>
                <div class="col-sm-4">
                    <input class="form-control" id="email" type="text" placeholder="请输入邮箱">
                </div>
                <button type="button" class="btn btn-success" style="margin-left:-300px" id="send">发送邮件</button>
            </div>
            <span style="margin-left:-350px;display:block;margin-bottom:15px;color:red" id="msgo"></span>
            <div class="form-group">
                <div class="col-sm-7">
                    <button type="button" class="btn btn-primary btn-lg" id="nextBtn" style="margin-top:30px;margin-left:100px;">下一步</button>
                </div>
            </div>
        </form>
    </div>
    <div id="cett" style="display:none;margin-bottom:20px;">
        <h1>邮件已发送，请您在新绑定邮箱中--确认修改！！！</h1>
        <a href="/login" class="btn btn-success btn-lg">返回登录</a>
    </div>
</center>
<script type="text/javascript">
bool = false;
$('#email').blur(function(){
    reg = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
    if ($(this).val() == '') {
        bool = false;
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('邮箱不能为空！！！');
    } else if (!reg.test($(this).val())) {
        bool = false;
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('邮箱格式不正确！！！');
    } else {
        bool = true;
        $('#one').removeClass('has-error');
        $('#one').addClass('has-success');
        $('#msgo').html('');
    }
});

$('#send').click(function(){
    if (bool) {
        email = $('#email').val();
        $.get('/home/myemail/send', {email:email}, function(data) {
            if (data.msg == 1) {
                $('#one').addClass('has-error');
                $('#one').removeClass('has-success');
                $('#msgo').html('该邮箱已被绑定！！！');
            } else {
                n = 30;
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
                $("#nextBtn").on("click", function() {
                $step.nextStep();
                $('#ceto').css('display', 'none');
                $('#cett').css('display', 'block');
            });
            }
        }, 'json');
    } else {
        $('#one').addClass('has-error');
        $('#one').removeClass('has-success');
        $('#msgo').html('请确保您所输入的邮箱正确！！！');
    }
});

var $step = $("#step");
$step.step({
    index: 0,
    time: 500,
    title: ["输入新绑定邮箱", "邮箱确认"]
});
</script>  
</body>
</html>