<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\Http\Requests\AdminGoodsRequest;// 导入校验类

class AdmingoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载后台商品模块列表页
    public function index()
    {
        //获取商品的数据
        $goods = DB::table('goods')->join('cates', 'goods.cid', '=', 'cates.id')->select(DB::raw('*,goods.name as sname,goods.id as sid,cates.name as cname,cates.id as csid'))->paginate(10);
        //加载模板
        return view('Admin.Goods.index', ['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品添加
    public function create()
    {
        // 调用类别控制器的方法
        $cate = CatesController::getCates();
        // 加载模板
        return view('Admin.Goods.add', ['cate' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加
    public function store(Request $request)
    {
        //获取参数信息
        $data = $request->except('_token');
        //图片上传
        if($request->hasFile('pic')){
            //获取上传文件后缀
            $extension=$request->file('pic')->getClientOriginalExtension();
            //随机图片的名字
            $s=time()+rand(1,9999);
            //把上传的图片移动到指定的位置下
            $request->file('pic')->move(Config::get('app.app_upload'),$s.".".$extension);
            //处理
            $data['pic']=trim(Config::get('app.app_upload')."/".$s.".".$extension,'.');
            // dd($data);
            //执行数据库的插入操作
            if(DB::table('goods')->insert($data)){
                // echo "1111";
                return redirect('/admingoods')->with('success','添加成功');
            }else{
                // echo "0000";
                return redirect('/admingoods')->with('error','添加失败');
            }
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
    // 修改
    public function edit($id)
    {
        //获取到需要修改的信息
        $info=DB::table('goods')->where('id','=',$id)->first();
        //加载模板
        return view('Admin.Goods.edit', ['info' => $info]);
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
        //修改图片
        //获取需要修改的数据
        $info=DB::table('goods')->where('id','=',$id)->first();
        //获取pic
        $m=".".$info->pic;
        //获取参数
        $data=$request->except(['_token','_method']);
        if($request->hasFile('pic')){
        //获取后缀
            $extension=$request->file('pic')->getClientOriginalExtension();
            //随机文件名字
            $s=time()+rand(1,9999);
            $request->file('pic')->move(Config::get('app.app_upload'),$s.".".$extension);
            $data['pic']=trim(Config::get('app.app_upload').'/'.$s.".".$extension,".");
            //执行数据库的修改操作
            if(DB::table('goods')->where('id','=',$id)->update($data)){
            //删除原图
                unlink($m);
                return redirect('/admingoods')->with('success','修改成功');
            }else{
                return redirect('/admingoods')->with('with','修改失败');
            }
        }else{
            //不修改图片
            if(DB::table('goods')->where('id','=',$request->input('id'))->update($data)){
                return redirect('/admingoods')->with('success','修改成功');
            }else{
                return redirect('/admingoods')->with('with','修改失败');
            }
        }
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
    public function del(Request $request)
    {
        //获取参数id
        $id = $request->input('id');
        
        if (DB::table('goods')->where('id', '=', $id)->delete()) {
            //json格式
            return response()->json(['msg' => 1]);
        } else {
            return response()->json(['msg' => 0]);
        }
    }
}
