<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodslistController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //模糊查询商品列表
        $keyword = $request->input('keyword');
        $list = DB::table("goods")
                    ->where("status", "=", 1)
                    ->where("dcr", "like", "%" . $keyword . "%")
                    ->paginate(12);

        //分类
        $cates = getcatesbypid(0);

        //分界词
        $str = 'mh';

        return view("Home.Goods.list", ["list" => $list, "keyword" => $keyword, "str" => $str, "cates" => $cates]);
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
        //分类查询商品列表
        $list = DB::table("goods")->where("cid", "=", $id)->where("status", "=", 1)->paginate(12);

        $gcate = DB::select("select id, name, pid from cates where id = :id", ["id" => $id])[0];
        $pcate = DB::select("select name from cates where id = :id", ["id" => $gcate->pid])[0];
        
        //热销
        $hot = $this->hot($id);
        $num = array_column($hot, 'num');
        array_multisort($num, SORT_DESC, $hot);
        $hot = array_slice($hot, 0, 8);
        // dd($list);

        //分类
        $cates = getcatesbypid(0);

        //分界词
        $str = 'lb';

        return view("Home.Goods.list", ["cates" => $cates, "gcate" => $gcate, "pcate" => $pcate->name, "list" => $list, "hot" => $hot, "str" => $str]);
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
