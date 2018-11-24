<?php
// 后台商品模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\Http\Requests\AdminGoodsRequest;// 导入商品添加校验类
use App\Http\Requests\GoodsRequest;// 导入商品修改校验类
use App\Http\Requests\GoodsInfoInsert;// 导入添加详情校验类

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
        $goods = DB::table('goods')->join('cates', 'goods.cid', '=', 'cates.id')->select(DB::raw('*,goods.name as sname,goods.id as sid,cates.name as cname,cates.id as csid'))->orderBy('goods.id', 'dscr')->paginate(10);
        // dd($goods);
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
    public function store(AdminGoodsRequest $request)
    {
        //获取参数信息
        $data = $request->except('_token');
        // dd($data);
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

    // 修改状态
    public function goodsstatus(Request $request)
    {
        // dd($request);
        $id = $request->input('id');
        $sta = $request->input('status');
        if ($sta == 0) {
            $sta = 1;
        } else {
            $sta = 0;
        }
        if (DB::update("update goods set status={$sta} where id={$id}")) {
            return response()->json(['msg' => 1, 'sta' => $sta]);
        }else{
            return response()->json(['msg' => 0, 'sta' => $sta]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改商品信息
    public function edit($id)
    {
        //获取到需要修改的信息
        $info = DB::table('goods')->where('id', '=', $id)->first();
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
    // 执行方法
    public function update(GoodsRequest $request, $id)
    {
        //修改图片
        //获取需要修改的数据
        $info = DB::table('goods')->where('id','=',$id)->first();
        //获取pic
        $m = ".".$info->pic;
        //获取参数
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('pic')) {
        //获取后缀
            $extension = $request->file('pic')->getClientOriginalExtension();
            //随机文件名字
            $s = time() + rand(1,9999);
            $request->file('pic')->move(Config::get('app.app_upload'), $s.".".$extension);
            $data['pic'] = trim(Config::get('app.app_upload').'/'.$s.".".$extension,".");
            //执行数据库的修改操作
            if (DB::table('goods')->where('id','=',$id)->update($data)) {
                //删除原图
                unlink($m);
                return redirect('/admingoods')->with('success', '修改成功');
            } else {
                return redirect('/admingoods')->with('with', '修改失败');
            }
        } else {
            //不修改图片
            if (DB::table('goods')->where('id', '=', $request->input('id'))->update($data)) {
                return redirect('/admingoods')->with('success','修改成功');
            } else {
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

    // Ajax删除商品
    public function del(Request $request)
    {
        //获取参数id
        $id = $request->input('id');
        // 判断删除是否成功
        if (DB::table('goods')->where('id', '=', $id)->delete()) {
            // 判断有无详情数据
            if(DB::table('goods_info')->where('gid', '=', $id)->first()) {
                // 删除对应的详情数据
                DB::table('goods_info')->where('gid', '=', $id)->delete();
                //json格式
                return response()->json(['msg' => 1]);
            } else {
                return response()->json(['msg' => 1]);
            }
           
        } else {
            return response()->json(['msg' => 0]);
        }
    }

    // Ajax删除商品详情
    public function delete(Request $request)
    {
        //获取参数id
        $id = $request->input('id');
        if (DB::table('goods_info')->where('gid', '=', $id)->delete()) {
            //json格式
            return response()->json(['msg' => 1]);
        } else {
            return response()->json(['msg' => 0]);
        }
    }

    // 商品详情添加
    public function addgoodsinfo($id)
    {
        // 判断详情表对应id是否有数据
        if ($data = DB::table('goods_info')->where('gid', '=', $id)->first()){
            // dd($data);
            return view('Admin.Goods.infoedit', ['data' => $data, 'gid' => $id]);
        }else{
            $info = DB::table('goods')->where('id', '=', $id)->first();
            return view('Admin.Goods.addinfo', ['info' => $info]);
        }
    }

    // 执行详情添加
    public function doaddgoodsinfo(GoodsInfoInsert $request)
    {
        // 排除掉信息
        $data = $request->except('_token', 'id');
        $data['gid'] = $request->input('id');// 商品id
        // 包装方式
        if ($data['package'] == 0) {
            $data['package'] = '箱装';
        } elseif ($data['package'] == 1) {
            $data['package'] = '盒装';
        } elseif ($data['package'] == 2) {
            $data['package'] = '袋装';
        }
        $data['pro_time'] = date('Y-m-d h:i:s', time());// 生产日期
        $data['lmt_time'] = date('Y-m-d h:i:s', strtotime("+15days",time()));// 过期日期
        // dd($data);
        if (DB::table('goods_info')->insert($data)) {
           return redirect('/admingoods')->with('success','添加成功');
        }else{
            // echo "0000";
            return redirect('/admingoods')->with('error','添加失败');
        }
    }

    // 商品详情表
    public function goodsinfo($id)
    {
        // 查询数据
        $data = DB::table('goods_info')->where('gid', '=', $id)->first();
        return view('Admin.Goods.goodsinfo', ['data' => $data]);
    }
    // 详情修改
    public function updateinfo(GoodsInfoInsert $request,$id)
    {
        // 获取要修改的数据
        $info = DB::table('goods_info')->where('gid', '=', $id)->first();
        // 获取接收的数据
        $data = $request->except('_token');
        // 修改
        // dd($data);
        // $str = $info['pic_up'];
        // if (preg_match_all('/src="(.+?)"/', $str, $matches)) {
        //     foreach ($matches[1] as $key => $value) {
        //     $m = '.'.$value;
        //     unlink($m);
        //     }
        // }
        // $str1 = $info['pic_down'];
        // if (preg_match_all('/src="(.+?)"/', $str1, $matches1)) {
        //     foreach ($matches1[1] as $k => $v) {
        //     $m1 = '.'.$v;
        //     unlink($m1);
        //     }
        // }
        // 包装方式
        if ($data['package'] == 0) {
            $data['package'] = '箱装';
        } elseif ($data['package'] == 1) {
            $data['package'] = '盒装';
        } elseif ($data['package'] == 2) {
            $data['package'] = '袋装';
        }
        $data['gid'] = $id;// 商品id
        $data['pro_time'] = date('Y-m-d h:i:s', time());// 生产日期
        $data['lmt_time'] = date('Y-m-d h:i:s', strtotime("+15days",time()));// 过期日期
        if(DB::table('goods_info')->where('gid', '=', $id)->update($data)){
            return redirect('/admingoods')->with('success', '修改成功');
        }else{
            return redirect('/admingoods')->with('error', '修改失败');
        }
   
    }
}
