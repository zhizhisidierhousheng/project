<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Paycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
    //支付宝 接口调用    
    public function pays(Request $request)
    {
        //将订单id存进session 以便改变付款状态
        $request->session()->push('oid',$_POST['oid']);
        //跳转到支付宝支付
        pay();
    }
 
    //通知界面    
    public function returnurl(Request $request)
    {        
        //获取session里的oid
        $id = session('oid');
        //遍历得到数据
        foreach ($id as $key => $value) {
            //得到对应用户的oid
            $oid = $value;
        }
        //将该用户的支付状态从0改为1 （已付款）
        DB::table('orders')->where('id','=',$oid)->update(['pay'=>1]);
        //销毁session
        $request->session()->pull('oid');
        //跳转回商城 并弹框提示用户
        return redirect('/index');
    }
}
