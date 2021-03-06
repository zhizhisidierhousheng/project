<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //获取热销
    public function hot($cid)
    {
        //热销
        $time = strtotime('-7 day');
        $hotgoods = DB::table("orders")
                        ->join("orders_info", "orders.id", "=", "orders_info.oid")
                        ->join("goods", "orders_info.gid", "=", "goods.id")
                        ->select("orders.time", "orders_info.*", "goods.pic", "goods.name")
                        ->where("orders.time", ">", $time)
                        ->where("goods.cid", "=", $cid)
                        ->where("goods.status", "=", 1)
                        ->get();
        $arr = array();
        foreach ($hotgoods as $value) {
            if (empty($arr[$value->gid])) {
                $arr[$value->gid]['num'] = 0;
            }
            $arr[$value->gid]['gid'] = $value->gid;
            $arr[$value->gid]['gpic'] = $value->gpic;
            $arr[$value->gid]['gname'] = $value->name;
            $arr[$value->gid]['gprice'] = $value->gprice;
            $arr[$value->gid]['num'] = $value->num + $arr[$value->gid]['num'];
        }
        return $arr;
    }

    // 加载首页
    public function index()
    {

        //前台首页
        //获取最新订单
        $orders = DB::table("orders")
                      ->join("orders_info", "orders.id", "=", "orders_info.oid")
                      ->orderBy("time", "DESC")
                      ->limit(5)
                      ->get();
        // 轮播图
        $loop = DB::table('looppic')
                      ->where('status', '=', '1')
                      ->limit(4)
                      ->get();

        //获取公告
        $notice = DB::table("notice")
                      ->orderBy("inputtime", "DESC")
                      ->limit(5)
                      ->get();

        //获取广告
        $adv = DB::table("adv")->where("status", "=", 1)->limit(1)->first();
        // dd($adv);

        //分类
        $cates = getcatesbypid(0);
        // dd($cate);
        //热销
        $time = strtotime('-7 day');
        $hotgoods = DB::table("orders")
                        ->join("orders_info", "orders.id", "=", "orders_info.oid")
                        ->join("goods", "orders_info.gid", "=", "goods.id")
                        ->select("orders.time", "orders_info.*", "goods.pic", "goods.name")
                        ->where("orders.time", ">", $time)
                        ->where("goods.status", "=", 1)
                        ->get();
        $arr = array();
        foreach ($hotgoods as $value) {
            if (empty($arr[$value->gid])) {
                $arr[$value->gid]['num'] = 0;
            }
            $arr[$value->gid]['gid'] = $value->gid;
            $arr[$value->gid]['gpic'] = $value->gpic;
            $arr[$value->gid]['gname'] = $value->name;
            $arr[$value->gid]['gprice'] = $value->gprice;
            $arr[$value->gid]['num'] = $value->num + $arr[$value->gid]['num'];
        }
        $num = array_column($arr, 'num');
        array_multisort($num, SORT_DESC, $arr);
        $hotgoods = array_slice($arr, 0, 8);

        //按分类遍历商品
        $list = array();
        $arr = array();
        foreach ($cates as $cate) {
            foreach ($cate->suv as $row) {
                $list[$cate->id][$row->id] = DB::table('goods')->where('cid', '=', $row->id)->where('status', '=', 1)->get();
            }
        }
        foreach ($list as $key => $val) {
            foreach ($val as $v) {
                foreach ($v as $l) {
                    $arr[$key][] = $l;
                }
            }
            if (!empty($arr[$key])) {
                shuffle($arr[$key]);
                $arr[$key] = array_slice($arr[$key], 0, 8);
            }
        }
        $list = $arr;

        //最新商品
        $bnew = DB::table("goods")->orderBy("id", "DESC")->where("status", "=", 1)->limit(8)->get();
        // dd($hotcate);
        
        //获取session中的商品
        $shop = session('shop');
        // dd($shop);
        //加载前台模版
        return view("Home.Home.index", ["cates" => $cates, "orders" => $orders, "notice" => $notice, "adv" => $adv, "hotgoods" => $hotgoods, "list" => $list, "bnew" => $bnew, 'loop' => $loop, 'shop' => $shop]);
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
        //
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
        //
    }
}
