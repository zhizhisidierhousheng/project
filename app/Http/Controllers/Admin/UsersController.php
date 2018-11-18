<?php
// 会员模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入模型类
use App\Models\Users;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载会员列表
    public function index(Request $request)
    {
        //获取数据总条数
        $tot = DB::table("users")->count();
        //规定下每页显示的数据条数
        $rev = 5;
        //获取总页数
        $sums = ceil($tot/$rev);
        for ($i = 1; $i <= $sums; $i++) {
            $pp[$i] = $i;
        } 
        //获取附加参数值
        $page = $request->input('page');
        //判断$page为空
        if (empty($page)) {
            $page = 1;
        } 
        //偏移量
        $offset = ($page-1)*$rev;
        //准备sql语句
        $sql = "select * from users limit $offset,$rev";
        //执行sql
        $data = DB::select($sql);

        // dd($request->input('keywords'));
        // 获取搜素的关键词
        $K = $request->input('keywords');
        // 会员列表
        $search = DB::table('users')->where('name', 'like', '%'.$k.'%');
        //判断当前请求是否为Ajax请求
        if($request->ajax()){
            //加载一个独立的模板界面
            return view("Admin.Users.test", ['data' => $data, 'search' => $search, 'request' => $request->all()]);
        } 
        //加载模板
        return view("Admin.Users.index", ['pp' => $pp, 'data' => $data, 'search' => $search, 'request' => $request->all()]);
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
    // 获取会员详情
    public function show($id)
    {
        // 获取用户对应得详情信息
        $info = Users::find($id)->info;
        // 加载模板 分配数据
        return view("Admin.Users.info", ['info' => $info]);
    }

    // 获取会员地址
    public function address($id)
    {
        // 获取对应的地址数据
        $address = Users::find($id)->getaddress;
        // 加载模板
        return view("Admin.Users.address", ['address' => $address]);
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
