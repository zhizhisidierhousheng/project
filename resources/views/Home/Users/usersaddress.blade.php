<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/static/home/css/common.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/fonts/iconfont.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/sumoselect.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/purebox-metro.css" rel="stylesheet" id="skin" /> 
  <script src="/static/home/js/jquery.min.1.8.2.js" type="text/javascript"></script> 
  <script src="/static/home/js/jquery.sumoselect.js"></script> 
  <script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
  <script src="/static/home/js/common_js.js" type="text/javascript"></script> 
  <script src="/static/home/js/footer.js" type="text/javascript"></script> 
  <title>收货地址管理</title> 
  <script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
 </head>  
 <!--[if IE]>
        <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]--> 
 <body>   
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
         @foreach($address as $row)
         <ul class="Address_info"> 
          <div class="address_title"> 
           <a href="#" class="modify iconfont icon-fankui btn btn-primary" title="修改信息" data-toggle="modal" id="purebox"></a> 地址信息 
           <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close2"></i></a>
          </div> 
          <li>收件人：{{$row->name}}</li> 
          <li>收货地址：{{$row->area . $row->address}}</li> 
          <li>手机号：{{$row->phone}}</li> 
          <li>邮政编码：610000</li> 
         </ul>
         @endforeach
        </div> 
       </div> 
       <form> 
        <div class="Add_Addresss"> 
         <div class="title_name">
          <i></i>添加地址
         </div> 
         <table> 
          <tbody>
           <tr> 
            <td class="label_name">收货区域</td> 
            <td colspan="3" class="select"> <label> 国家/地区 </label><select class="kitjs-form-suggestselect "></select> <label> 省份 </label><select class="kitjs-form-suggestselect "></select> <label> 市/县 </label><select class="kitjs-form-suggestselect "></select> <label> 区/县 </label><select class="kitjs-form-suggestselect"></select> </td> 
           </tr> 
           <tr>
            <td class="label_name">详细地址</td>
            <td><input name="" type="text" class="Add-text" /><i>（必填）</i></td> 
            <td class="label_name">手&nbsp;&nbsp;机</td>
            <td><input name="" type="text" class="Add-text" /><i>（必填）</i></td> 
           </tr> 
           <tr> 
            <td class="label_name">收件人姓名</td>
            <td><input name="" type="text" class="Add-text" /><i>（必填）</i></td> 
            <td class="label_name">邮&nbsp;&nbsp;编</td>
            <td><input name="" type="text" class="Add-text" /><i>（必填）</i></td> 
           </tr>
          </tbody>
         </table> 
         <div class="address_Note">
          <span>注：</span>只能添加5个收货地址信息。请乎用假名填写地址，如造成损失由收货人自己承担。
         </div> 
         <div class="btn">
          <input name="1" type="submit" value="添加地址" class="Add_btn" />
         </div> 
        </div> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <script src="/static/home/purebox/bootstrap-transition.js"></script> 
  <script src="/static/home/purebox/application.js"></script> 
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
</html>