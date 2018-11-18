<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类

class UserscollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = 1;
        //会员收藏页
        //获取当前登录的会员名
        // $name = session('name');
        //获取当前会员id
        // $data = DB::table("users")->where("name", "=", $name)->first();
        // $id = $data->id;
        //获取头像
        $pic = DB::select("select pic from users_info where uid = :uid", ["uid" => $uid])[0];
        //获取该会员的商品收藏数据
        //收藏数
        $num = DB::table("goods_collect")->where("uid", "=", $uid)->count();
        //收藏商品信息
        $goods = DB::table("goods")
                     ->join("goods_collect", "goods.id", "=", "goods_collect.gid")
                     ->where("goods_collect.uid", "=", $uid)
                     ->paginate(12);

        //每个商品对应的收藏数并存入$goods中
        foreach ($goods as $info) {
            $collect = DB::table("goods_collect")
                           ->where("gid", "=", $info->id)
                           ->get()
                           ->groupBy("gid");
            foreach ($collect as $coll) {
                $info->collect = count($coll);
            }
        }

        return view("Home.Users.userscollect", ["num" => $num, "goods" => $goods, "pic" => $pic]);
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
        //添加商品收藏

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
        //获取当前登录的会员名
        $name = session('name');
        //获取当前会员id
        $data = DB::table("users")->where("name", "=", $name)->first();
        $uid = $data->id;
        //删除单条收藏
        if (DB::delete("delete from goods_collect where uid = :uid and gid = :gid", ["uid" => $uid, "gid" => $id])) {
            redirect("/home/userscollect");
        } else {
            redirect("/home/userscollect");
        }
    }
}
