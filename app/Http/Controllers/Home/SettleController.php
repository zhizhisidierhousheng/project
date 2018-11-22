<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class SettleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $uid = session['uid'];
        // echo $uid;exit;
        $uid = session('uid');
        // dd($uid);
        
        // $data = DB::table('cart')->where('user_id','=',$uid)->get();
        $data=DB::table('cart')->join('goods','cart.goods_id','=','goods.id')->where('cart.user_id','=',$uid)->get();
        // var_dump($data);exit;
        $address = DB::table('users_address')->where('uid','=',$uid)->get();
        // var_dump($address);exit;
        return view('Home.Order.Order',['address'=>$address,'data'=>$data,'uid'=>$uid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 生成临时订单
    public function create(Request $request)
    {
        // $uid = $request->input('uid');
        // $totalprice = $request->input('totalprice');
        // echo $uid;
        // echo $totalprice;
        // session(['uid'=>$uid]);

        // $uid        = $request->input('uid');
        // $totalprice = $request->input('totalprice');
        // $_SESSION['uid']=$uid;
        // session(['totalprice'=>$totalprice]);
        // var_dump($uid);exit;
        // echo $totalprice;
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
    public function show($uid)
    {
        // echo $id;exit;
        session(['uid'=>$uid]);
        
        return redirect('/order');
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
    public function settle(Request $request)
    {
        //查询当前用户的收货地址
        // $uid = session('******.id');
        // $name = session('name');
        //根据杨明存下的name 查询到相应用户的uid
        $id = DB::table("users")->select()->where('name','=','user')->get();
        // 取出用户ID
        foreach ($id as $r){
            $uid = $r->id;
        }
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

        // dd($newArr);
        return view('Home.Settle.settle')->with('shop',$newArr)->with('address',$address);
    }
}
