<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类
use App\Models\Orders; //导入模型类
use Session;

class UserscenterController extends Controller
{
    //分配数据并显示会员中心页面
    public function userscenter()
    {
        $uid = getuid();
        //获取会员头像
        $pic = DB::select("select pic from users_info where uid = :uid", ["uid" => $uid])[0];

        //获取订单信息(最近30天的订单)
        //获取30天前的时间戳用于比较
        $time = strtotime('-1 month');
        //获取订单
        $orders = Orders::where("uid", "=", $uid)->paginate(3);
        //获取订单数
        $onum = DB::table("orders")->where("uid", "=", $uid)->count();
        //订单表与订单详情表联查获取数据
        $sql = "select * from orders as od,orders_info as oi where od.id = oi.oid and od.time > :time and od.uid = :uid";
        $info = DB::select($sql, ['time' => $time, 'uid' => $uid]);
        //将订单号相同的订单详情信息统一存入订单数组的info键里
        foreach ($orders as $order) {
            $order->time = date("Y-m-d H:i:s", $order->time);
            $arr = array();
            foreach ($info as $value) {
                if ($order->id == $value->oid) {
                    $arr[] = $value;
                }
            }
            $order->info = $arr;
        }

        //随机获取9条广告
        //获取广告表中有几条数据
        $num = DB::table("adv")->count();
        //获取广告id
        $ids = DB::select("select id from adv where status = 1");
        //将id存入数组并打乱顺序
        $adv = array();
        foreach ($ids as $value) {
            $adv[] = $value->id;
        }
        shuffle($adv);
        $adv = array_slice($adv, 0, 9);
        // dd($adv);
        //通过id字符串查询广告
        $advs = DB::table("adv")->whereIn("id", $adv)->get();

        //获取该会员最新的9条收藏记录
        $collect = DB::table("goods_collect")
                       ->join("goods", "goods_collect.gid", "=", "goods.id")
                       ->where("goods_collect.uid", "=", $uid)
                       ->orderBy("goods_collect.time", "desc")
                       ->limit(9)
                       ->get();

        //最新公告
        $notice = DB::select("select * from notice order by inputtime desc limit 1")[0];

        //分类
        $cates = getcatesbypid(0);

        return view("Home.Users.userscenter", ["orders" => $orders, "advs" => $advs, "collect" => $collect, "notice" => $notice, "pic" => $pic, "onum" => $onum, "cates" => $cates]);
    }
}
