<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类
use App\Models\Orders; //引入订单模型类

class UsersorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //会员订单页
        //获取传递参数
        $page = $request->input('page');
        $status = $request->input('status');
        $uid = 1;
        //获取头像
        $pic = DB::select("select pic from users_info where uid = :uid", ["uid" => $uid])[0];

        //获取所有分页
        //获取数据总条数
        $tot = DB::table("orders")->where("uid", "=", $uid)->count();
        //每页显示数据条数
        $rev = 4;
        //获取最大页
        $maxpage = ceil($tot / $rev);
        //判断
        if (empty($page)) {
            $page = 1;
        }
        $offset = ($page - 1) * $rev;

        //获取订单信息
        //获取订单
        $orders = DB::table("orders")->where("uid", "=", $uid)->orderBy("time", "DESC")->paginate(4);
        //订单表与订单详情表联查获取数据
        $sql = "select * from orders as od,orders_info as oi where od.id = oi.oid and od.uid = :uid";
        $info = DB::select($sql, ['uid' => $uid]);
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
        // dd($orders);
        //待发货
        $a = DB::table("orders")->where("uid", "=", $uid)->where("status", "=", 0)->get();
        //已发货
        $b = DB::table("orders")->where("uid", "=", $uid)->where("status", "=", 1)->get();
        //派送中
        $c = DB::table("orders")->where("uid", "=", $uid)->where("status", "=", 2)->get();
        //已验收
        $d = DB::table("orders")->where("uid", "=", $uid)->where("status", "=", 3)->get();

        //返回第一页数据
        $pagenum = array();
        for ($i = 1;$i < $maxpage;$i ++) {
            $pagenum[$i] = $i;
        }

        //判断请求是否为ajax
        if ($request->ajax()) {
            //获取所有分页
            //获取数据总条数
            $tot = DB::table("orders")->where("uid", "=", $uid)->where("status", "=", $status)->count();
            //获取最大页
            $maxpage = ceil($tot / $rev);
            //判断
            if (empty($page)) {
                $page = 1;
            }
            $offset = ($page - 1) * $rev;
            //返回第一页数据
            $pagenum = array();
            for ($i = 1;$i < $maxpage;$i ++) {
                $pagenum[$i] = $i;
            }

            //获取订单信息
            //获取订单
            $orders = DB::select("select * from orders where uid = {$uid} and status = {$status} order by time desc limit {$offset},{$rev}");
            //订单表与订单详情表联查获取数据
            $sql = "select * from orders as od,orders_info as oi where od.id = oi.oid and od.uid = :uid and od.status = :status";
            $info = DB::select($sql, ['uid' => $uid, 'status' => $status]);
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
            // dd($pagenum);
            return view("Home.Users.ajaxorder", ["orders" => $orders, "pic" => $pic, "a" => $a, "b" => $b, "c" => $c, "d" => $d, "status" => $status, "pagenum" => $pagenum]);
        }
        
        return view("Home.Users.usersorder", ["orders" => $orders, "pic" => $pic, "a" => $a, "b" => $b, "c" => $c, "d" => $d, "pagenum" => $pagenum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid = 1;
        //订单详情页
        //获取订单详细信息
        $info = DB::select("select * from orders as o,orders_info as i where o.id = i.oid and o.uid = :uid", ["uid" => $uid]);
        //获取地址
        $data = $address = DB::select("select a.*,o.id as oid,o.coupon_id,o.total,c.money from orders as o,users_address as a,coupon as c where o.uid = a.uid and o.coupon_id = c.id and o.id = :oid and o.uid = :uid", ["oid" => $id, "uid" => $uid])[0];
        //整合数据
        $data->info = $info;
        // dd($data);

        return view("Home.Users.ordersinfo", ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //会员订单删除
        if (DB::table("orders")->where("id", "=", $id)->delete()) {
            if (DB::table("orders_info")->where("oid", "=", $id)->delete()) {
                return redirect("/home/usersorder");
            }
        } else {
            return redirect("/home/usersorder");
        }
    }
}
