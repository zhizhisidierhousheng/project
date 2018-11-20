<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class OrderController extends Controller
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
        
        // $data = DB::table('cart')->where('user_id','=',$uid)->get();
        $data=DB::table('cart')->join('goods','cart.goods_id','=','goods.id')->where('cart.user_id','=',$uid)->get();
        // var_dump($data);exit;
        $address = DB::table('users_address')->where('uid','=',$uid)->get();
        // var_dump($address);exit;
        return view('Home.Order.Order',['address'=>$address,'data'=>$data]);
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
}
