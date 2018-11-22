<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CartController extends Controller
{
    //购物车页面
    public function index()
    {
        //获取session中的商品
        $data = session('shop');
        return view('Home.Cart.Cart')->with('data',$data);
    }
    //添加进购物车
    public function create(Request $request)
    {
        // echo '加入购物车';
        //数据处理
        $data=session('shop')?session('shop'):array();
        $a = 0;
        if ($data) {
            foreach ($data as $key => &$value) {
                # code...
                // if ($value['id'] == $_GET['id']) {
                //     $value['num'] = $value['num'] + $_GET['num'];

                //     $a = 1;
                // }
                if ($value['id'] == 1) {
                    $value['num'] = $value['num'] + 10;

                    $a = 1;
                }
            }
        }
        if(!$a){
            $data[]=array(        
            // 'id'=>$_GET['id'],
            'id'=>"1",
            // 'num'=>$_GET['num'],
            'num'=>"20",
            // 'goodsInfo'=>\DB::table('goods')->where('id',$_GET['id '])->first(),
            'goodsInfo'=>\DB::table('goods')->where('id',1)->first(),
            );
        }
        
        $request->session()->put('shop',$data);
        return redirect('/cart');
    }
    //
    public function store(Request $request)
    {
        $goodsid = $request->except(['id']);
        
        $request->session()->push('cart',$goodsid);
        //跳转
        return redirect('/cart');
    }
    //删除商品(session)
    public function del(Request $request)
    {
        // 获取ID
        $id = $request->input('id');
        //获取商品数据
        $shop = session('shop');
        //遍历数据
        foreach ($shop as $key => $value) {
            # code...
            //判断需要删除的数据
            if ($value['id'] == $id) {
                # code...
                unset($shop[$key]);
            }
        }
        //写入session
        $request->session()->put('shop',$shop);
        //用来判断是否删除成功
        echo 1;

    }
    //ajax删除选中
    public function choosedel(Request $request)
    {
        $arr = $request->input('arr');


        if ($arr == ""){
            echo "请至少选中一条";
            
        }else{
            //获取商品数据
            $shop = session('shop');
            //遍历数据
            foreach ($shop as $key => $value) {
                # code...
                //判断需要删除的数据
                if ($value['id'] == $arr) {
                    # code...
                    unset($shop[$key]);

                }
            }
            //写入session
            $request->session()->put('shop',$shop);
            //用来判断是否删除成功
            echo 1;
            var_dump($shop);
        }
    }
    //购物车数量加（ajax）
    public function numadd(Request $request)
    {
        // var_dump($request->all());
        //获取修改的ID
        $id = $request->input('goodsid');
        //获取session数据
        $shop = session('shop');

        //遍历数据
        foreach ($shop as $key => $value) {
            # code...
            if ($value['id'] == $id) {
                # code...
                $shop[$key]['num']=++$shop[$key]['num'];
            }
        }
        //写入session
        $request->session()->put('shop',$shop);
        echo 1;
    }
    //购物车数量减（ajax）
    public function numsub(Request $request)
    {
        // var_dump($request->all());
        //获取修改的ID
        $id = $request->input('goodsid');
        //获取session数据
        $shop = session('shop');

        //遍历数据
        foreach ($shop as $key => $value) {
            # code...
            if ($value['id'] == $id) {
                # code...
                $shop[$key]['num']=--$shop[$key]['num'];
            }
        }
        //写入session
        $request->session()->put('shop',$shop);
        //用来判断是否删除成功
        echo 1;
    }
    //商品详情添加至购物车
    public function goodsaddcart(Request $request)
    {
        //数据处理
        $data=session('shop')?session('shop'):array();
        $a = 0;
        if ($data) {
            foreach ($data as $key => &$value) {
                # code...
                // if ($value['id'] == $_GET['id']) {
                //     $value['num'] = $value['num'] + $_GET['num'];

                //     $a = 1;
                // }
                if ($value['id'] == 1) {
                    $value['num'] = $value['num'] + 10;

                    $a = 1;
                }
            }
        }
        if(!$a){
            $data[]=array(        
            // 'id'=>$_GET['id'],
            'id'=>"1",
            // 'num'=>$_GET['num'],
            'num'=>"20",
            // 'goodsInfo'=>\DB::table('goods')->where('id',$_GET['id '])->first(),
            'goodsInfo'=>\DB::table('goods')->where('id',1)->first(),
            );
        }
        
        $request->session()->put('shop',$data);
        return redirect('/cart');
    }
    //商品列表添加至购物车
    public function listaddcart(Request $request)
    {
        //数据处理
        //加入购物车
        $data=session('shop')?session('shop'):array();
        $a = 0;
        if ($data) {
            foreach ($data as $key => &$value) {
                // if ($value['id'] == $_GET['id']) {
                //     $value['num'] = $value['num'] + $_GET['num'];

                //     $a = 1;
                // }
                if ($value['id'] == 1) {
                    $value['num'] = $value['num'] + 1;

                    $a = 1;
                }
            }
        }
        if(!$a){
            $data[]=array(        
            // 'id'=>$_GET['id'],
            'id'=>"1",
            // 'num'=>$_GET['num'],
            'num'=>"1",
            // 'goodsInfo'=>\DB::table('goods')->where('id',$_GET['id '])->first(),
            'goodsInfo'=>\DB::table('goods')->where('id',1)->first(),
            );
        }
        
        $request->session()->put('shop',$data);
        return redirect('/cart');
    }
}
