<!DOCTYPE html>
<html>
 <head> 
  <meta charset="UTF-8" /> 
  <title></title> 
  <link rel="stylesheet" type="text/css" href="/static/home/change/css/link.css" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/change/css/layui.css" /> 
 </head> 
 <body> 
  <div class="rebinding-box"> 
   <div class="box-title"> 
    <h2 class="mtb5">修改绑定邮箱</h2> 
    <i>为了保障您的帐户安全，请先进行安全验证</i> 
   </div> 
   <div class="box-timeline"> 
    <ul class="text-center" style="width: 800px;"> 
     <li> 填写登录密码 
      <div class="box-num1">
        1 
      </div> </li> 
     <li class="ml45"> 绑定新邮箱 
      <div class="box-outside1 outside1ab" id="outside1abs"> 
       <div class="box-num2 num2ab">
         2 
       </div> 
      </div> </li> 
     <li class="ml45"> 完成 
      <div class="box-outside2 outside2a" id="outside2as"> 
       <div class="box-num3 num3a">
         3 
       </div> 
      </div> </li> 
     <div class="clear"> 
     </div> 
    </ul> 
   </div> 
   <!--第一步--> 
   <div class="twobox-form" id="twoform"> 
    <form class="twoform"> 
     <div class="twoform-box"> 
      <div class="newtel"> 
       <label class="twoform-label">新邮箱</label> 
       <div class="twoform-input"> 
        <input type="text" id="ntel" autocomplete="off" placeholder="请输入新手机号" /> 
       </div> 
      </div> 
      <div class="validatecode"> 
       <label class="twoform-label2">验证码</label> 
       <div class="twoform-input2"> 
        <input type="text" autocomplete="off" placeholder="请输入验证码" /> 
       </div> 
       <button class="sendcode" disabled="disabled">发送验证码</button> 
      </div> 
     </div> 
    </form> 
    <div class="twobtn-box"> 
     <button class="twobtn" id="twobtn" onclick="fun1()">下一步</button> 
    </div> 
   </div> 
   <!--第二步--> 
   <div class="threebox-form" id="threeform"> 
    <div class="successr"> 
     <div class="symbol"> 
     </div> 
     <p>恭喜您，修改绑定手机号成功！</p> 
     <button class="confirm">确认</button> 
    </div> 
   </div> 
  </div>  
  <script src="/static/home/change/js/layui.js" type="text/javascript" charset="utf-8"></script> 
  <script type="text/javascript">
  var twobtns=document.getElementById("twobtn");
  var soutside1ab=document.getElementById("outside1abs");
  var soutside2as=document.getElementById("outside2as");
  var twoforms=document.getElementById("twoform");
  var threeforms=document.getElementById("threeform");
  function fun1(){
      var str=document.getElementById("ntel").value;
      isPoneAvailable(str);
      function isPoneAvailable(str) {  
        var myreg=/^[1][0-9]{10}$/;  
        if (!myreg.test(str)) {  
            alert("请输入正确的手机号")
            return false;
        } else { 
            threeforms.style.display="block";
            twoforms.style.display="none";
            soutside2as.classList.remove("outside2a");
        }
      }
  }
  </script>  
</body>
</html>