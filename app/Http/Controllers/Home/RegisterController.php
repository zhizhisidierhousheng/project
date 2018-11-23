<?php
// 前台注册控制器
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载注册页面
        return redirect('/register/create');
    }

    // 检测用户名是否重复
    public function registername(Request $request)
    {
        // 接收传来的name
        $name = $request->input('name');
        // 获取name一列的信息
        $names = DB::table('users')->pluck('name');
        // 把对象集合转换为数组
        $arr = array();
        foreach ($names as $key => $value) {
            $arr[$key] = $value;
        }
        // 判断是否重复
        if (in_array($name, $arr)) {
            echo 1;// 用户名重复
        } else {
            echo 2;// 用户名可用
        }
    }

    // 检测手机号是否重复
    public function registerphone(Request $request)
    {
        // 接收传来的phone
        $phone = $request->input('phone');
        // 获取phone一列的信息
        $phones = DB::table('users')->pluck('phone');
        // 把对象集合转换为数组
        $arrs = array();
        foreach ($phones as $key => $value) {
            $arrs[$key] = $value;
        }
        // 判断是否重复
        if (in_array($phone, $arrs)) {
            echo 1;// 手机号已注册
        } else {
            echo 2;// 手机号可用
        }
    }

     // 获取手机校验码
    public function codeget(Request $request)
    {
        // 获取前台输入手机号
        $p = $request->input('p');
        // 调用方法发送验证码短信
        return sendphone($p);
    }

    // 检测输入的校验码
    public function checkcode(Request $request)
    {
        // 获取输入的校验码
        $code = $request->input('code');
        // 判断校验码
        if (isset($_COOKIE['scode']) && !empty($code)) {
            // 获取系统校验码
            $scode = $request->cookie('scode');
            // 对比校验码
            if ($code == $scode) {
                echo 4;// 校验码正确
            }else{
                echo 1;// 校验码有误
            }
        }elseif (empty($code)) {
            echo 2;// 校验码为空
        }else{
            echo 3;// 校验码过期
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载注册页面
    public function create()
    {
        // 加载注册页面
        return view('Home.Register.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // 注册信息存入数据库
    public function store(Request $request)
    {
        // 获取输入的校验码
        $code = $request->input('code');
        // 获取系统的校验码
        $scode = $request->cookie('scode');
        // 排除不添加信息
        $data = $request->except(['_token', 'code']);
        // 密码加密
        $data['password'] = Hash::make($data['password']);
        // 判断校验码正误
        if ($code == $scode) {
            // 判断传入是否成功
            if (DB::table('users')->insert($data)) {
                // 获取当前插入的数据
                $info = DB::table('users')->where('phone', '=', $data['phone'])->first();
                // 获取当前用户id
                $id = $info->id;
                // 获取默认头像路径
                $pic = '/static/home/images/myhead.jpg';
                // 添加相应的用户详情的id和默认头像
                DB::table('users_info')->insert(['uid' => $id, 'pic' => $pic]);
                // 跳转登录页
                return redirect('/login/create')->with('success', '注册成功');
            }
        }else{
            return redirect('/register/create')->with('error', '校验码有误,请重新输入');
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
