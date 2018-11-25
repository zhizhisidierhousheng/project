<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入数据库操作
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分类
        $cates = getcatesbypid(0);
        //获取所有数据
        // $data=DB::table('link')->get();
        //获取数据总条数
        $count=DB::table('link')->where('status','=',1)->count();
        //设置每页显示数据条数
        $rev=20;
        //获取最大有多少页
        $maxpage=ceil($count/$rev);
        //遍历出所有页数
        for ($i=1; $i <= $maxpage ; $i++) { 
            # code...
            $pp[$i]=$i;
        }
        //获取传递参数
        $page=$request->input('page');
        //
        if (empty($page)){
            $page=1;
        }

        $offset=($page-1)*$rev;
        //执行sql
        $sql="select * from link where status=1 limit {$offset},{$rev}";
        $data=DB::select($sql);
        //判断是否ajax请求 （用于第一次进入页面显示第一页）
        if ($request->ajax()) {
            // echo $page;exit;
            
            //独立加载一个模板
            return view('Home.Page.homelinkpage',['pp'=>$pp,'data'=>$data]);
        }
        //返回第一页数据
        return view('Home.Link.link',['data'=>$data,'pp'=>$pp,'count'=>$count, 'cates' => $cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $Request)
    {
        //分类
        $cates = getcatesbypid(0);
        // echo 111;
        // dd($Request->all());
        //获取所有数据
        $data=$Request->all();
        //得到相应的数据
        $name=$data['name'];
        $email=$data['email'];
        $url=$data['url'];
        //status默认为0(未审核)
        $status=0;
        //添加入库
        
        $db=DB::table('link')->insert(['name'=>$name,'email'=>$email,'url'=>$url,'status'=>$status]);

        return redirect('/link');
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
