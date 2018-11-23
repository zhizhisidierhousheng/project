<?php
// 前台商品详情
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index($id)
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
       // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 跳转商品详情表
    public function show($id)
    {
        $data = getcatesbypid(0);

        // 商品详情
        $goods = DB::table('goods')->join('goods_info', 'goods.id', '=', 'goods_info.gid')->where('id', '=', $id)->first();
        
        // 小图获取
        $str = $goods->pic_up;
        preg_match_all('/src="(.+?)"/', $str, $matches);
        $goods->pic_up = $matches[1];
        // 描述图获取
        $str1 = $goods->pic_down;
        preg_match_all('/src="(.+?)"/', $str1, $matches1);
        $goods->pic_down = $matches1[1];

        // 获取评论内容
        $comment = DB::table('comment')->join('users', 'comment.uid', '=', 'users.id')->where('gid', '=', $id)->orderBy('inputtime', 'desc')->select('comment.*', 'users.name')->get();
        // 获取评论总数
        $commentTot = DB::table('comment')->where('gid', '=', $id)->count();
        // 好评总数
        $goodTot = DB::table('comment')->where([['gid', '=', $id], ['start', '>', 4]])->count();
        // 差评总数
        $lowTot = DB::table('comment')->where([['gid', '=', $id], ['start', '<=', 2]])->count();
        // 中评总数
        $inTot = $commentTot-$goodTot-$lowTot;
        $arr = array(
            'commentTot' => $commentTot,
            'goodTot' => $goodTot,
            'lowTot' => $lowTot,
            'inTot' => $inTot,
            );

        // 获取分类id
        $cates = DB::table('goods')->join('cates', 'goods.cid', '=', 'cates.id')->where('goods.id', '=', $id)->select('cates.id')->first();
        // 得到当前分类下最新的3个商品
        $goodss = DB::table('cates')->join('goods', 'cates.id', '=', 'goods.cid')->where('cates.id', '=', $cates->id)->where('goods.status', '=', 1)->orderBy('goods.id', 'desc')->limit(3)->get();
        // dd($goods);
        // dd($comment);
        // 加载商品页面
        return view('Home.Goods.index', ['data' => $data, 'goods' => $goods, 'comment' => $comment, 'arr' => $arr, 'goodss' => $goodss]);
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
