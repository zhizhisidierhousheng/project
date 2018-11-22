<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
class LooppicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取图片总数
        $count=DB::table('looppic')->count();
        if ($count != 0){
        //设置每页显示数据条数
        $rev=3;
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
        $sql="select * from looppic limit {$offset},{$rev}";
        $data=DB::select($sql);
        //判断是否ajax请求 （用于第一次进入页面显示第一页）
        if ($request->ajax()) {
            // echo $page;exit;
            
            //独立加载一个模板
            return view('Admin.Page.looppicpage',['data'=>$data,'pp'=>$pp,'count'=>$count]);
        }
        //返回第一页数据
        
        // echo $page;
        // dd($pp);
        // dd($data);
        return view('Admin.Looppic.looppic',['data'=>$data,'pp'=>$pp,'count'=>$count]);
        }else{
        return view('Admin.Looppic.looppic',['count'=>$count]);
        }
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //得到图片描述
        $dcr = $request->input('dcr');
        //判断是否得到数据（图片描述是否为空）
        if($request->hasFile('pic') && $dcr!='' ){
            //获取图片后缀
            $ext=$request->file("pic")->getClientOriginalExtension();
            // 设置图片文件名
            $filename = time()+rand(1,10000);
            // 上传图片
            $request->file('pic')->move('./uploads/looppic/',$filename.'.'.$ext);
            //获取上传路径
            $url = '/uploads/looppic/'.$filename.'.'.$ext;
            //添加到数据库
            DB::table('looppic')->insert([
                                            'dcr'=>$dcr,
                                            'url'=>$url,
                                            'status'=>0
                                        ]);

            return redirect('/adminlooppic');
        }else{
            return view('Admin.Looppic.add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /************这是删除！！！！！*************/
    public function show($id)
    {
        //执行删除
        DB::table('looppic')->where('id','=',$id)->delete();
        return redirect('/adminlooppic');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $te=DB::table('looppic')->where('id','=',$id)->get();
        $stu=$te[0]->status;
        //进来的status的值是1就变为0 是0就变为1
        if ($stu==0) {
            $stu=1;
        } else {
            $stu=0;
            
        }
        //修改数据库中的status
        $db=DB::table('looppic')->where('id','=',$id)->update(['status'=>$stu]);
        return redirect('/adminlooppic');
    }
    //这是用于跳转轮播图添加页面
    public function adminpicadd()
    {
        return view('Admin.Looppic.add');
    }
    public function choosedel(request $request)
    {
        $arr = $request->input('arr');
        if ($arr == ""){
            echo "请至少选中一条";
        }else{
            // echo json_encode($arr);
            foreach($arr as $key => $value){
                DB::table('looppic')->where('id','=',$value)->delete();
            }
            echo 1;
        }
    }
}
