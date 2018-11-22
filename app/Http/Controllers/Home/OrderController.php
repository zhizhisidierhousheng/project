<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
//订单控制器
class Ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->input('uid');
        // var_dump($request->all());exit;
        // 接收地址id
        $aid    = $request->input('aid');
        //接收
        $ids    = $request->input('ids');
        $nums   = $request->input('goodsnum');
        $total  = $request->input('total');
        $pics  = $request->input('pic');
        $dcrs  = $request->input('dcr');
        $prices = $request->input('price');
        $time   = date('Y/m/d H:i:s', time());
        // dd($time);
        //获取用户id
        // $uid = session('******.id');
        // $name = session('name');
        //根据杨明存下的name 查询到相应用户的uid
        $id = DB::table("users")->select()->where('name','=','user')->get();
        // 取出用户ID
        foreach ($id as $r){
            $uid = $r->id;
        }

        //生成订单号
        $code = $uid.time();
        // dd($code);

        //生成订单
        for ($i=0; $i < count($ids) ; $i++) { 
            # code...
            $data = array();
            $data['id']=$code;
            $data['uid']=$uid;
            $data['total']=$total;
            $data['address_id']=$aid[$i];
            $data['time']=$time;
            $data['status']=0;
            $data['pay']=0;
            // dd($data);
            \DB::table('orders')->insert($data);
        }
        //生成订单详情
        for ($i=0; $i < count($ids) ; $i++) { 
            # code...
            $data1 = array();
            $data1['oid']=$code;
            $data1['gid']=$ids[$i];
            $data1['gprice']=$prices[$i];
            $data1['gdcr']=$dcrs[$i];
            $data1['gpic']=$pics[$i];
            $data1['num']=$nums[$i];
            // dd($data1);
            \DB::table('orders_info')->insert($data1);
        }
            //删除购物车里关于此订单的物品（sesssion）
            //获取商品数据
            $shop = session('shop');
            //遍历数据
            foreach ($shop as $key => $value) {
                foreach ($ids as $k => $v) {
                    //判断需要删除的数据
                    if ($v == $value['id']) {
                        # code...
                        unset($shop[$key]);
                    }
                }
                
            }
            //写入session
            $request->session()->put('shop',$shop);
            // dd($code);
            return redirect("/pay/{$code}");
    }
    //支付页面
    public function pay($code)
    {
        $orders = DB::table('orders')->join('orders_info','orders.id','=','orders_info.oid')->join('users_address','orders.address_id','=','users_address.id')->where('orders.id','=',$code)->get();
        // dd($orders);
        return view('Home.Pay.pay')->with('order',$orders);
    }
    //支付宝 接口调用    
    public function pays()
    {
        session(['oid'=>$_POST['oid']]);
        pay();    
    }
 
    //通知界面    
    public function returnurl()
    {        
        dd(session('oid'));
    }
}
