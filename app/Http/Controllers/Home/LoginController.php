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
    public function index(Request $request)
    {
        // 退出销毁session
        $request->session()->pull('name');
        $request->session()->pull('phone');
        $request->session()->pull('email');
        
        // 返回首页
        return redirect('/login/create');
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
        $builder->build($width = 200, $height = 40, $font = null);
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
        
        // 检测数据库用户名/手机/邮箱
        $info = DB::table('users')->where('name', '=', $name)->orwhere('phone', '=', $name)->orwhere('email', '=', $name)->first();
       
        // 1.检测用户名
        if ($info ) {
            // 2.检测密码
            if ($password == $info->password) {
                // 把用户信息存入到session 里
                session(['name' => $name]);
                session(['phone' => $name]);
                session(['email' => $name]);
                // 3.检测验证码
                if (Session::get('milkcaptcha') == $userInput) {

                    // 登录成功跳到商城首页
                    return redirect('/index'); 
                } else {
                    // 验证码错误
                    
                }
            } else {
                // 密码不对
                
            }
        } else {
            // 用户名不对
            return back()->whit('error', '用户名不正确');
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
