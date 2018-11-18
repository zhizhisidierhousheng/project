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
  <div style="width:800px;margin-left:400px;">
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
        <a href="javascript:;" class="btn btn-success" style="margin-left:-400px" id="send">获取验证码</a>
      </div>
      <span style="margin-left:-430px;display:block;margin-bottom:15px" id="msgt"></span>
      <div class="form-group">
        <div class="col-sm-7">
          <a href="javascript:;" class="btn btn-primary btn-lg" id="nextBtn">确定</a>
        </div>
      </div>
    </form>
  </div>
  </center>
  <script type="text/javascript">
      var $step = $("#step");
      $step.step({
        index: 0,
        time: 500,
        title: ["输入新绑定手机号", "完成"]
      });
      $("#nextBtn").on("click", function() {
        $step.nextStep();
      });
      bool = true;
      $('#phone').blur(function(){
          reg = /^1[34578]\d{9}$/;
          if (!reg.test($(this).val())) {
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
              $.get('/home/myphone/change', {phone:phone}, function(data) {
                  //
              }, 'json');
          } else {
              alert('请检查您所输入的手机号是否正确！！！');
          }
      })
    </script>  
 </body>
</html>