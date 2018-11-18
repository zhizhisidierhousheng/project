<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类
use App\Models\Orders; //导入模型类

class UserscenterController extends Controller
{
    //分配数据并显示会员中心页面
    public function userscenter()
    {
        //判断用户是否登录
        // if ($request->session()->has('name')) {
        //     redirect("/home/userslogin")->with('error', '请先登录');
        // } else {
        //     $uid = DB::select("select name form users where name = :name", ["name" => session('name')]);
        // }
        $uid = 1;
        //获取会员头像
        $pic = DB::select("select pic from users_info where uid = :uid", ["uid" => $uid])[0];

        //获取订单信息(最近30天的订单)
        //获取30天前的时间戳用于比较
        $time = strtotime('-1 month');
        //获取订单
        $orders = Orders::where("uid", "=", $uid)->get();
        //订单表与订单详情表联查获取数据
        $sql = "select * from orders as od,orders_info as oi where od.id = oi.oid and od.time > :time and od.uid = :uid";
        $info = DB::select($sql, ['time' => $time, 'uid' => $uid]);
        //将订单号相同的订单详情信息统一存入订单数组的info键里
        foreach ($orders as $value) {
            $value->info = $info;
        }

        //随机获取9条广告
        //获取广告表中有几条数据
        $num = DB::table("adv")->count();
        //获取广告id
        $ids = DB::select("select id from adv");
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

        return view("Home.Users.userscenter", ["orders" => $orders, "advs" => $advs, "collect" => $collect, "notice" => $notice, "pic" => $pic]);
    }

    public function uphone()
    {
        //修改手机
    }

    public function uemail()
    {
        //修改邮箱
    }
}
