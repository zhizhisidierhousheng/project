<?php
// 前台登录控制器
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引用验证码对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
// 引入DB
use DB;
// 引入Hash
use Hash;
// 引入session
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 退出跳转
    public function index(Request $request)
    {
        // 退出销毁session
        $request->session()->pull('username');
        
        // 返回首页
        return redirect('/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 前台登录页面
    public function create()
    { 
        // 加载登录页面
        return view('Home.Login.login');
    }

    // 验证码方法
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 150, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 登录方法
    public function store(Request $request)
    {
        // 获取登录的用户信息和密码
        $name = $request->input('name');
        $password = $request->input('password');
        // 获取输入的验证码
        $userInput = \Request::get('captcha');
        
        // 检测数据库用户名或手机号
        $info = DB::table('users')->where('name', '=', $name)->orwhere('phone', '=', $name)->first();
       
        // 1.检测用户名
        if ($info ) {
            // 2.检测密码
            // if (Hash::check($password, $info->password)) {
                // 把用户信息存入到session 里
                session(['username' => $info->name]);
                session(['time' => date('Y-m-d H:i:s', time())]);
                // 3.检测验证码
                if (Session::get('milkcaptcha') == $userInput) {
                    // 登录成功跳到商城首页
                    return redirect('/index'); 
                } else {
                    // 验证码错误
                    return back()->with('error', '验证码不正确');
                }
            // } else {
                // 密码不对
                // return back()->with('error', '密码输入错误');
            // }
        } else {
            // 用户名不对
            return back()->with('error', '用户名不存在');
        }
    }

    // 重置密码验证用户
    public function forget()
    {
        // 加载验证用户
        return view('Home.Login.forget');
    }

    // 校验手机号
    public function forgetphone(Request $request)
    {
        // 接收传来的手机号
        $phone = $request->input('phone');
         // 获取phone一列的信息
        $phones = DB::table('users')->pluck('phone');

        // 把对象集合转换为数组
        foreach ($phones as $key => $value) {
            $arrs[$key] = $value;
        }
        // 判断是否存在
        if (in_array($phone, $arrs)) {
            echo 1;// 已注册手机号
        } else {
            echo 2;// 手机号不存在可注册
        }
    }

    // 获取校验码
    public function forgetcodeget(Request $request)
    {
        // 获取前台输入的手机号
        $p = $request->input('p');
        // 调用方法发送验证码短信
        return sendphone($p);
    }

    // 校验重置密码短信
    public function forgetcheckcode(Request $request)
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

    // 跳转重置密码模板
    public function doforget(Request $request)
    {
        // 接收传来的手机号
        $phone = $request->input('phone');
        // 查询当前用户数据
        $info = DB::table('users')->where('phone', '=', $phone)->first();
        // 跳转修改密码页
        return view('Home.Login.reset', ['info' => $info]);
    }

    // 重置密码方法
    public function reset(Request $request)
    {
        // 获取修改用户的id
        $id = $request->input('id');
        // 加密密码
        $data['password'] = Hash::make($request->input('password'));
        // 存入密码
        DB::table("users")->where("id", '=', $id)->update($data);
        // 跳转登录页
        return redirect("/login/create")->with('success', '密码修改成功');
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
