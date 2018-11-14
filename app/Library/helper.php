<?php 

// 发送的短信校验码方法
function sendphone($phone)
{

	//初始化必填
	//填写在开发者控制台首页上的Account Sid
	$options['accountsid'] = '3346d44029a59272ba94edfd75e418be';
	//填写在开发者控制台首页上的Auth Token
	$options['token'] = 'db7aa0c0b0aa74db760be14fcd9e1c3a';
	//初始化$options必填
	$ucpass = new Ucpaas($options);
	$appid = '0c5bd719714e4bc0b9987445f81375f4';//应用的ID，可在开发者控制台内的短信产品下查看
	// $appid = 'xxxxxxxx';//应用的ID，可在开发者控制台内的短信产品下查看
	//短信模板id
	$templateid = '387159';//可在后台短信产品→选择接入的应用→短信模板-模板ID,查看改模板ID
	//发送的短信校验码
	$param = rand(1, 999999);//多个参数使用英文逗号隔开（如：param="a,b,c"),若无参数则留空
	//放置在cookie 3分钟后过期
	setcookie('fcode', $param, time() + 180);
	//接收验证码的手机号
	$mobile = $phone;
	$uid = '';
	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}
	
	
