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
    // 无限分类方法
    public function getcatesbypid($pid)
    {
        $res = DB::table("cates")->where("pid", "=", $pid)->get();
        $data = [];
        //遍历 把对应得到的子类信息 添加到SUV下标里面
        foreach ($res as $key => $value) {
            $value->suv = $this->getcatesbypid($value->id);
            $data[] = $value;
        }
        return $data;
    }

    // 加载首页
    public function index()
    {
        // session(['name' => 'user']);
        $data = $this->getcatesbypid(0);
        // 轮播图
        $loop = DB::table('looppic')->where('status', '=', '1')->limit(4)->get();
        //dd($data);
        //加载前台模版
        return view("Home.Home.index", ["data" => $data, 'loop' => $loop]);

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
