<?php
$redis=new Redis();
$redis->connect('localhost',6379);
$redis->auth('123456');
//获取订单id
$order_id=$redis->get('o2o28orderid');
//修改订单状态 加入支付时间
$static=0;//状态 已经付款
$buy_time=time();//支付时间
$pdo=new PDO("mysql:host=localhost;dbname=dy","root","666666");
$pdo->exec("set names utf8");
$sql="update morder set static='{$static}',buy_time='{$buy_time}' where id=$order_id";
//返回预处理
$list=$pdo->prepare($sql);
$list->execute();
 ?>
<div style="width:100%;height:200px;background-color:red">支付ok</div>