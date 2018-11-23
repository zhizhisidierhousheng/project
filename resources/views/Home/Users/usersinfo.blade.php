@extends("Home.HomePublic.public")
@section("home")
<head> 
<script src="/static/home/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
<script src="/static/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> 
<link rel="stylesheet" href="/static/home/huploads/css/cropper.min.css">
<link rel="stylesheet" href="/static/home/huploads/css/ImgCropping.css">
</head> 
<body> 
<!--个人信息样式--> 
<div class="user_style clearfix"> 
    <div class="user_center"> 
        <div class="left_style"> 
            <div class="menu_style"> 
                <div class="user_title">会员中心</div> 
                <div class="user_Head"> 
                    <div class="user_portrait"> 
                        <a href="/home/usersinfo" title="修改头像" class="btn_link"></a> 
                        <img src="{{$info->pic}}" /> 
                        <div class="background_img"></div> 
                    </div> 
                    <div class="user_name"> 
                        <p><span class="name">{{Session::get('username')}}</span><a href="/forget">[修改密码]</a></p> 
                        <p>访问时间：{{Session::get('time')}}</p> 
                    </div> 
                </div> 
                <div class="sideMen"> 
                    <!--菜单列表图层--> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_1"></em>订单中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/home/usersorder"> 我的订单</a></li> 
                                <li> <a href="/home/usersaddress">收货地址</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_2"></em>会员中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/home/usersinfo"> 会员信息</a></li>
                                <li> <a href="/home/userscollect"> 我的收藏</a></li> 
                                <li><a href="/home/userscomment"> 我的评论</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_3"></em>账户中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/home/userscoupon">优惠券</a></li> 
                            </ul> 
                        </dd> 
                    </dl> 
                    <dl class="accountSideOption1"> 
                        <dt class="transaction_manage">
                            <em class="icon_4"></em>安全中心
                        </dt> 
                        <dd> 
                            <ul> 
                                <li> <a href="/forget">修改密码</a></li>
                            </ul> 
                        </dd> 
                    </dl> 
                </div> 
            <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:false});</script> 
            </div> 
        </div> 
        <!--右侧样式--> 
        <div class="right_style"> 
            <div class="info_content"> 
                <!--个人信息--> 
                <div class="Personal_info" id="Personal"> 
                    <div class="title_Section">
                        <span>个人信息</span>
                    </div>
                    <ul class="xinxi">
                        <li>
                            <label>真实姓名：</label>
                            <span><input name="" type="text" value="@if(empty($info->username))未填写@else{{$info->username}}@endif" class="text" disabled="disabled" /></span>
                        </li>
                        <li>
                            <label>出身日期：</label>
                            <span><input name="" type="text" value="@if(empty($info->birthday))未填写@else{{$info->birthday}}@endif" class="text" disabled="disabled" /></span> 
                        </li> 
                        <li>
                            <label>会员性别：</label>
                            <span class="sex">
                            @if($info->sex == 0)女@endif
                            @if($info->sex == 1)男@endif
                            @if($info->sex == 2)保密@endif
                            </span> 
                            <div class="add_sex"> 
                                <input type="radio" name="sex" value="2" @if($info->sex == 2)checked="checked"@endif /> 保密&nbsp;&nbsp; 
                                <input type="radio" name="sex" value="1" @if($info->sex == 1)checked="checked"@endif /> 男&nbsp;&nbsp; 
                                <input type="radio" name="sex" value="0" @if($info->sex == 0)checked="checked"@endif /> 女&nbsp;&nbsp;
                            </div>
                        </li> 
                        <li>
                            <label>电子邮箱：</label>
                            <span>{{$info->email}}</span>
                            <a href="/home/myemail" class="change" target="_blank" style="display:none;color:red;text-decoration:underline">更换</a>
                        </li> 
                        <li>
                            <label>手机号码：</label>
                            <span>{{$info->phone}}</span>
                            <a href="/home/myphone" class="change" target="_blank" style="display:none;color:red;text-decoration:underline">更换</a>
                        </li> 
                        <div class="bottom">
                            <input name="" type="button" value="修改信息" class="modify" />
                            <input name="" type="button" value="确认修改" class="confirm" />
                        </div> 
                    </ul>
                    <ul class="Head_portrait"> 
                        <li class="User_avatar">
                            <img id="finalImg" src="{{$info->pic}}" width="200" height="200" />
                        </li>
                        <li>
                            <button class="submit" id="replaceImg">修改头像</button>
                        </li>
                    </ul>
                </div> 
            </div> 
        </div> 
    </div> 
</div>
<div style="display: none;z-index:9999" class="tailoring-container">
    <div class="black-cloth" onclick="closeTailor(this)"></div>
    <div class="tailoring-content">
        <div class="tailoring-content-one">
            <label title="上传图片" for="chooseImg" class="l-btn choose-btn">
            <input type="file" accept="image/jpg,image/jpeg,image/png" name="file" id="chooseImg" class="hidden" onchange="selectImg(this)">选择图片</label>
            <div class="close-tailoring"  onclick="closeTailor(this)">×</div>
        </div>
        <div class="tailoring-content-two">
            <div class="tailoring-box-parcel">
                <img id="tailoringImg">
            </div>
            <div class="preview-box-parcel">
                <p>图片预览：</p>
                <div class="square previewImg"></div>
                <div class="circular previewImg"></div>
            </div>
        </div>
        <div class="tailoring-content-three">
            <button class="l-btn cropper-reset-btn">复位</button>
            <button class="l-btn cropper-rotate-btn">旋转</button>
            <button class="l-btn cropper-scaleX-btn">换向</button>
            <form action="/home/usersinfo/{{$info->uid}}" method="post" style="display:inline;">
                <input type="hidden" name="pic" />
                {{csrf_field()}}
                {{method_field('PUT')}}
                <button class="l-btn sureCut" id="sureCut" type="submit">确认修改</button>
            </form>
        </div>
    </div>
</div>
</body>
<!-- <script src="/static/home/huploads/js/jquery-1.10.2.js"></script> -->
<script src="/static/home/huploads/js/cropper.min.js"></script>
<script>

//弹出框水平垂直居中
(window.onresize = function () {
    var win_height = $(window).height();
    var win_width = $(window).width();
    if (win_width <= 768){
        $(".tailoring-content").css({
            "top": (win_height - $(".tailoring-content").outerHeight())/2,
            "left": 0
        });
    }else{
        $(".tailoring-content").css({
            "top": (win_height - $(".tailoring-content").outerHeight())/2,
            "left": (win_width - $(".tailoring-content").outerWidth())/2
        });
    }
})();

//弹出图片裁剪框
$("#replaceImg").on("click",function () {
    $(".tailoring-container").toggle();
});

//图像上传
function selectImg(file) {
    if (!file.files || !file.files[0]){
        return;
    }
    var reader = new FileReader();
    reader.onload = function (evt) {
    var replaceSrc = evt.target.result;
    //更换cropper的图片
    $('#tailoringImg').cropper('replace', replaceSrc,false);//  默认false，适应高度，不失真
    }
    reader.readAsDataURL(file.files[0]);
}

//cropper图片裁剪
$('#tailoringImg').cropper({
    aspectRatio: 1/1,//默认比例
    preview: '.previewImg',//预览视图
    guides: false,  //裁剪框的虚线(九宫格)
    autoCropArea: 0.5,  //0-1之间的数值，定义自动剪裁区域的大小，默认0.8
    movable: false, //是否允许移动图片
    dragCrop: true,  //是否允许移除当前的剪裁框，并通过拖动来新建一个剪裁框区域
    movable: true,  //是否允许移动剪裁框
    resizable: true,  //是否允许改变裁剪框的大小
    zoomable: false,  //是否允许缩放图片大小
    mouseWheelZoom: false,  //是否允许通过鼠标滚轮来缩放图片
    touchDragZoom: true,  //是否允许通过触摸移动来缩放图片
    rotatable: true,  //是否允许旋转图片
    crop: function(e) {
        // 输出结果数据裁剪图像。
    }
});

//旋转
$(".cropper-rotate-btn").on("click",function () {
    $('#tailoringImg').cropper("rotate", 45);
});
//复位
$(".cropper-reset-btn").on("click",function () {
    $('#tailoringImg').cropper("reset");
});
//换向
var flagX = true;
$(".cropper-scaleX-btn").on("click",function () {
    if(flagX){
        $('#tailoringImg').cropper("scaleX", -1);
        flagX = false;
    }else{
        $('#tailoringImg').cropper("scaleX", 1);
        flagX = true;
    }
    flagX != flagX;
});

//裁剪后的处理
$("#sureCut").on("click",function () {
    if ($("#tailoringImg").attr("src") == null ){
        return false;
    }else{
        var cas = $('#tailoringImg').cropper('getCroppedCanvas');//获取被裁剪后的canvas
        var base64url = cas.toDataURL('image/png'); //转换为base64地址形式
        $("#finalImg").prop("src",base64url);//显示为图片的形式
        //将base64url存入隐藏域
        $('input[name=pic]').val(base64url);

        //关闭裁剪框
        closeTailor();
    }
});

//关闭裁剪框
function closeTailor() {
    $(".tailoring-container").toggle();
}

//ajax个人信息修改
check = true;
reg = /^(\d{4})-(0\d{1}|1[0-2])-(0\d{1}|[12]\d{1}|3[01])$/;
$('.text').last().blur(function(){
    if (!reg.test($(this).val())) {
        check = false;
        alert('请按格式(yyyy-mm-dd)填写！！！');
    } else {
        check = true;
    }
});

$('.confirm').click(function(){
    bool = true;
    arr = [];
    $('.text').each(function(){
        if ($(this).attr("disabled") == "disabled") {
            bool = false;
        } else {
            bool = true;
            arr[arr.length] = $(this).val();
        }
    });
    arr.shift();
    if (!reg.test(arr[1])) {
        bool = false;
        alert('请按格式(yyyy-mm-dd)填写！！！');
    }
    if (bool && check) {
        username = arr[0];
        birthday = arr[1];
        sex = $(':checked').val();
        $.get("/home/ajaxinfo", {username:username, birthday:birthday, sex:sex}, function(data) {
            if (data.msg == 1) {
                $('.text').each(function(e){
                    obj = $(this);
                    if (e == 1) {
                        obj.val(username);
                        obj.attr("disabled", "disabled");
                        obj.removeClass("add");
                    } else if (e == 2) {
                        obj.val(birthday);
                        obj.attr("disabled", "disabled");
                        obj.removeClass("add");
                    }
                });
                if (sex == 0) {
                    $('.sex').html('女');
                } else if (sex == 1) {
                    $('.sex').html('男');
                } else {
                    $('.sex').html('保密');
                }
                $('input[type=radio][value='+sex+']').attr("checked", "checked");
                $('#Personal').find('.xinxi').removeClass("hover");
                $('.change').css('display', 'none');
                alert('修改成功');
            } else {
                step = confirm('修改失败，你确定要继续修改信息吗？');
                if (!step) {
                    $('.text').each(function(e){
                        obj = $(this);
                        if (e == 1) {
                            obj.val(data.username);
                            obj.attr("disabled", "disabled");
                            obj.removeClass("add");
                        } else if (e == 2) {
                            obj.val(data.birthday);
                            obj.attr("disabled", "disabled");
                            obj.removeClass("add");
                        }
                    });
                    if (data.sex == 0) {
                        $('.sex').html('女');
                    } else if (data.sex == 1) {
                        $('.sex').html('男');
                    } else {
                        $('.sex').html('保密');
                    }
                    $('input[type=radio][value='+data.sex+']').attr("checked", "checked");
                    $('#Personal').find('.xinxi').removeClass("hover");
                    $('.change').css('display', 'none');
                } else {
                    return false;
                }
            }
        }, 'json');
    } else {
        return false;
    }
});
</script>
@endsection
@section('title', '个人信息')