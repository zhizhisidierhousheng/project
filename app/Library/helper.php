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

 function pay()
 { 
 /* * * 功能：即时到账交易接口接入页 
 * 版本：3.4 * 
 * 修改日期：2016-03*08 * 
 * 说明：  
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并 非一定要使用该代码。 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 
 *************************注意*****************
 
 *如果您在接口集成过程中遇到问题，可以按照下面的途径来解决 *1、开发文档中心（https://doc.open.alipay.com/doc2/detail.htm? spm=a219a.7629140.0.0.KvddfJ&treeId=62&articleId=103740&docType=1） *2、商户帮助中心（https://cshall.alipay.com/enterprise/help_detail.htm?help_id=473888） *3、支持中心（https://support.open.alipay.com/alipay/support/index.htm）
 
 *如果想使用扩展功能,请按文档要求,自行添加到parameter数组即可。 ********************************************** */
 
	require_once("alipay.config.php");
	require_once("lib/alipay_submit.class.php");
 
/**************************请求参数**************************/
 
        //商户订单号，商户网站订单系统中唯一订单号，必填     
        $out_trade_no = $_POST['oid'];

        //订单名称，必填
        $subject = $_POST['gdcr'];

        //付款金额，必填
        $total_fee = 0.01;

        //商品描述，可空
        $body = $_POST['gdcr'];
 
 
 
 
 
/************************************************************/
 
//构造要请求的参数数组，无需改动
$parameter = array(        
"service"       	=> $alipay_config['service'],        
"partner"       	=> $alipay_config['partner'],        
"seller_id"  		=> $alipay_config['seller_id'],        
"payment_type"  	=> $alipay_config['payment_type'],        
"notify_url"    	=> $alipay_config['notify_url'],        
"return_url"    	=> $alipay_config['return_url'],                
"anti_phishing_key"	=> $alipay_config['anti_phishing_key'],        
"exter_invoke_ip"	=> $alipay_config['exter_invoke_ip'],        
"out_trade_no"  	=> $out_trade_no,        
"subject"   		=> $subject,        
"total_fee" 		=> $total_fee,        
"body"  			=> $body,        
"_input_charset"    => trim(strtolower($alipay_config['input_charset']))        
//其他业务参数根据在线开发文档，添加参数.
//文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1        //如"参数名"=>"参数值"        
);
 
//建立请求 
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;    
}
// 无限分类方法
function getcatesbypid($pid)
{
    $res = DB::table("cates")->where("pid", "=", $pid)->get();
    $data = [];
    //遍历 把对应得到的子类信息 添加到SUV下标里面
    foreach ($res as $key => $value) {
        $value->suv = getcatesbypid($value->id);
        $data[] = $value;
    }
    return $data;
}

// 根据session获取会员id
function getuid()
{
    $name = session('username');
    $res = DB::select("select id from users where name = :name", ["name" => $name])[0];
    return $res->id;
}
?>