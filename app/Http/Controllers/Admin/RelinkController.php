<?php
// 友情管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
class RelinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 列表页
    public function index(Request $request)
    {   
        //获取所有数据
        // $data=DB::table('link')->get();
        //获取数据总条数
        $count=DB::table('link')->count();
        //数据库不为空则进入
        if($count != 0){
        //设置每页显示数据条数
        $rev=8;
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
        $sql="select * from link limit {$offset},{$rev}";
        $data=DB::select($sql);
        //判断是否ajax请求 （用于第一次进入页面显示第一页）
        if ($request->ajax()) {
            // echo $page;exit;
            
            //独立加载一个模板
            return view('Admin.Page.relinkpage',['data'=>$data]);
        }
        //返回第一页数据
        return view('Admin.Link.relink',['data'=>$data,'pp'=>$pp,'count'=>$count]);
        }else{
            return view('Admin.Link.relink',['count'=>$count]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    /************这是普通删除！！！！！*************/
    public function show($id)
    {
        //执行删除
        DB::table('link')->where('id','=',$id)->delete();
        return redirect('/adminrelink');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改状态
    public function edit($id)
    {
        //获取数据
        $te=DB::table('link')->where('id','=',$id)->get();
        $stu=$te[0]->status;
        //进来的status的值是1就变为0 是0就变为1
        if ($stu==0) {
            $stu=1;
        } else {
            $stu=0;
            
        }
        //修改数据库中的status
        $db=DB::table('link')->where('id','=',$id)->update(['status'=>$stu]);
        return redirect('/adminrelink');
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

    // Ajax删除
    public function choosedel(request $request)
    {
        //获取需要修改的数字
        $arr = $request->input('arr');
        //判断数组是否为空
        if ($arr == ""){
            echo "请至少选中一条";
        }else{
            foreach($arr as $key => $value){
                //执行删除
                DB::table('link')->where('id','=',$value)->delete();
            }
            echo 1;
        }
    }
}
