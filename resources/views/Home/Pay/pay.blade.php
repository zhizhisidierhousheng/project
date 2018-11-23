<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>确认订单页</title>	
    	<link href="/static/home/css/common.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/css/ok-order.css" rel="stylesheet">
	</head>
	<body>
		<form action="/pays" method="post">
			<div class="pay-way">
				<ul>
					<li data-btn="true" class="zfb pay-pub active">
						<i></i>
						<span>支付宝</span>
						<em></em>
					</li>
				
				</ul>
				<div class="pay-detail clear">
					<h2>结算详情</h2>
				@foreach($order as $r)
				<ul>
					
					<li class="goods-price" style="margin-left:-500px">
						<span>订单id：{{$r->oid}}</span>
						<input type="hidden" name='oid' value="{{$r->oid}}">
						<em></em>
					</li>
					<li class="coupon-price" style="margin-left:-500px">
						<span>联系地址：{{$r->address}}</span>
						<em></em>
					</li>
					<li class="coupon-price" style="margin-left:-500px">
						<span>联系人：{{$r->name}}</span>
						<em></em>
					</li>
					<li class="coupon-price" style="margin-left:-500px">
						<span>商品：{{$r->gdcr}}</span>
						<input type="hidden" name='gdcr' value="{{$r->gdcr}}">
						<em></em>
					</li>
					<li class="coupon-price" style="margin-left:-500px">
						<span>联系电话：{{$r->phone}}</span>
						<em></em>
					</li>
					<li class="coupon-price" style="margin-left:-500px">
						<span>订单总金额：￥{{$r->total}}</span>
						<em></em>
					</li>
					<button class="submit-btn" style="float:left" >提交订单</button>
				</ul>
				@endforeach
			</div>
			{{csrf_field()}}
		</form>
	</body>
</html>

​