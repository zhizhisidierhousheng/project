<?php
// 链接列表模拟显示前台页面
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //获取所有数据
        // $data=DB::table('link')->get();
        //获取数据总条数
        $count=DB::table('link')->where('status','=',1)->count();
        if ($count != 0){
        //设置每页显示数据条数
        $rev=5;
        //获取最大有多少页
        $maxpage=ceil($count/$rev);
        
        // dd($maxpage);
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
            return view('Admin.Page.linkpage',['data'=>$data]);
        }
        //返回第一页数据
        
        // echo $page;
        // dd($pp);
        // dd($data);
        return view('Admin.Link.link',['data'=>$data,'pp'=>$pp,'count'=>$count]);
        }else{
         return view('Admin.Link.link',['count'=>$count]);
        }
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
