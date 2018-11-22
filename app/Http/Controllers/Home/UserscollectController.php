<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class UserscollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = getuid();
        //会员收藏页
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

        //分类
        $cates = getcatesbypid(0);

        return view("Home.Users.userscollect", ["num" => $num, "goods" => $goods, "pic" => $pic, "cates" => $cates]);
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
        //判断是否登录
        $uid = getuid();
        //执行添加
        $data['gid'] = $request->input('gid');
        $data['uid'] = $uid;
        $data['time'] = time();
        //查询该会员收藏商品
        $ids = DB::select("select gid from goods_collect where uid = :uid", ["uid" => $uid]);
        foreach ($ids as $row) {
            $id[] = $row->gid;
        }
        if (!in_array($data['gid'], $id)) {
            if (DB::table("goods_collect")->insert($data)) {
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
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
        $uid = getuid();
        //删除单条收藏
        if (DB::delete("delete from goods_collect where uid = :uid and gid = :gid", ["uid" => $uid, "gid" => $id])) {
            redirect("/home/userscollect");
        } else {
            redirect("/home/userscollect");
        }
    }
}
