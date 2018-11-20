<?php 

// 发送的短信校验码方法
function sendphone($p)
{

	//初始化必填
	//填写在开发者控制台首页上的Account Sid
	$options['accountsid'] = '1fb00bb3d9c48aa36cd2de5df1be8f17';
	//填写在开发者控制台首页上的Auth Token
	$options['token'] = '7a497453fa7436b63a6a66ddb5b89dd0';
	//初始化$options必填
	$ucpass = new Ucpaas($options);
	$appid = '9b5f2c5ffa704dabac2a2b824cadcab1';//应用的ID，可在开发者控制台内的短信产品下查看
	// $appid = 'xxxxxxxx';//应用的ID，可在开发者控制台内的短信产品下查看
	//短信模板id
	$templateid = '387105';//可在后台短信产品→选择接入的应用→短信模板-模板ID,查看改模板ID
	//发送的短信校验码
	$param = rand(1, 999999);//多个参数使用英文逗号隔开（如：param="a,b,c"),若无参数则留空
	//放置在cookie 1分钟后过期
	\Cookie::queue('scode', $param, 1);
	//接收验证码的手机号
	$mobile = $p;
	$uid = '';
	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}
