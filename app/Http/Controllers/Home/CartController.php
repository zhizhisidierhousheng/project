<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $uid=1;
        $data=DB::table('cart')->join('goods','cart.goods_id','=','goods.id')->where('cart.user_id','=',$uid)->get();
        // var_dump(count($data));exit;
        // if(empty($data)){

        // }
        
        return view('Home.Cart.Cart',['data'=>$data,'uid'=>$uid]);
        //三表关联
        // $data1=DB::table("cates")->join('brands','cates.id','=','brands.cates_id')->join('shops','brands.id','=','shops.brands_id')->get();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goodsid = $request->except(['id']);
        
        $request->session()->push('cart',$goodsid);
        //跳转
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $num     = $request->input('num');
        $goodsid = $request->input('goodsid');
        $uid     = $request->input('uid');
        // echo $num;
        // echo $goodsid;
        // echo $uid;
        DB::table('cart')->where('user_id','=',$uid)->where('goods_id','=',$goodsid)->update(['total'=>$num]);
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
    //删除商品
    public function destroy($id)
    {
        // echo 'destroy';
        // echo $id; exit;
        DB::table('cart')->where('goods_id','=',$id)->delete();
        return redirect('/cart');
    }
    public function choosedel(request $request)
    {
        $arr = $request->input('arr');
        $uid = $request->input('uid');
        if ($arr == ""){
            echo "请至少选中一条";
        }else{
            // echo json_encode($arr);
            foreach($arr as $key => $value){
                DB::table('cart')->where('goods_id','=',$value)->where('user_id','=',$uid)->delete();
            }
            echo 1;
        }
    }
}
