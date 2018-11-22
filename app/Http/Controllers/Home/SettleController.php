<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class SettleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        session(['uid'=>$uid]);
        
        return redirect('/order');
    }
    //购物车到结算页
    public function settle(Request $request)
    {
        if($request->input('goods')){
        //得到用户ID
        $uid = getuid();
        //获取用户地址
        $address = \DB::table("users_address")->select()->where('uid','=',$uid)->where('status','=',0)->get();
        //拿到用户在购物车选中的商品的数组
        $idArr = $request->input('goods');
        // dd($idArr);
        //读取session
        $shop = session('shop');
        //声明新数组address
        $newArr = array();
        //遍历购物车中所有的商品
        foreach ($idArr as $key => $value) {
            # code...
            foreach ($shop as $k => $v) {
                # code...
                //判断是否用户选择的商品
                if ($v['id'] == $value){
                    $newArr[] = $v;
                }
            }
        }
        //设置公共模板
        $cates = getcatesbypid(0);

        return view('Home.Settle.settle', ['cates' => $cates])->with('shop',$newArr)->with('address',$address);
        }else{
            return redirect()->back();
        }
    }
    //商品详情内直接购买
    public function goodssettle(Request $request)
    {
        //数据处理
        $data=session('shop')?session('shop'):array();
        $a = 0;
        if ($data) {
            foreach ($data as $key => &$value) {

                if ($value['id'] == $_GET['id']) {
                    $value['num'] = $value['num'] + $_GET['num'];

                    $a = 1;
                }
            }
        }
        //添加数据到session
        if(!$a){
            $data[]=array(        
            'id'=>$_GET['id'],
            'num'=>$_GET['num'],
            'goodsInfo'=>\DB::table('goods')->where('id',$_GET['id'])->first(),
            );
        }
        
        $request->session()->put('shop',$data);
        /****************/
        //获取用户id
        $uid = getuid();
        // 获取用户地址
        $address = \DB::table("users_address")->select()->where('uid','=',$uid)->where('status','=',0)->get();
        //拿到用户选中的商品的数组
        $idArr = $request->input('goods');
        //读取session
        $shop = session('shop');
        //设置公共模板
        $cates = getcatesbypid(0);

        return view('Home.Settle.settle', ['cates' => $cates])->with('shop',$shop)->with('address',$address);
    }
}
