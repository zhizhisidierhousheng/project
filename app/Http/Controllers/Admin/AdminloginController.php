<?php
// 后台登录
namespace App\Http\Controllers\Admin;

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

class AdminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 退出
        // 销毁session
        $request->session()->pull('name');
        $request->session()->pull('aname');
        $request->session()->pull('status');
        $request->session()->pull('nodelist');
        // 返回登录页面
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 登录页面
    public function create()
    {
        // 加载后台登录
        return view("Admin.Adminlogin.login");
    }

    // 验证码方法
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
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
        // 获取登录的用户名和密码
        $name = $request->input('name');
        $password = $request->input('password');
        // 获取输入的验证码
        $userInput = \Request::get('captcha');

        // 跟数据库表做对比
        // 检测用户名
        $info = DB::table('admin_users')->where('name', '=', $name)->first();
        // 1.检测用户名           
        if ($info) {
            // 2.检测密码
            if (Hash::check($password, $info->password)) {
                // 把用户信息写入到session
                session(['name' => $name]);
                
                // 获取用户角色表信息
                $user_role = DB::table('user_role')->where('uid', '=', $info->id)->first();

                // 判断是否拥有角色信息
                if (!empty($user_role->uid)) {
                    // 获取用户角色信息
                    $role = DB::table('role')->where('id', '=', $user_role->rid)->first();
                    // 获取管理员角色信息
                    // 把角色信息存在session里
                    session(['aname' => $role->name]);
                    session(['status' => $role->status]);
                }
               
                // 获取登录后台用户所有的权限信息
                $list = DB::select("select n.name,n.controllers,n.action from user_role as ur,role_node as rn,node as n  where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                // 初始化权限信息
                // 让所有管理员都具有访问后台首页权限
                $nodelist['AdminController'][] = "index";
                $nodelist['AdminController'][] = "create";
                // 遍历
                foreach ($list as $key => $value) {
                    // 把登录用户的所有权限写入$nodelist数组里
                    $nodelist[$value->controllers][] = $value->action;
                    // 如果权限列表有create就添加store
                    if ($value->action == 'create') {
                        $nodelist[$value->controllers][] = 'store';
                    } 
                    // 如果权限列表有edit就添加update
                    if ($value->action == 'edit') {
                        $nodelist[$value->controllers][] = 'edit';
                    }
                }
                // 把所有权限信息存在session里
                session(['nodelist' => $nodelist]);

                // 3.检测验证码
                if (Session::get('milkcaptcha') == $userInput) {
                    //用户输入验证码正确进入后台页面
                    return redirect('/admin');
                } else {
                    // 验证码输入错误
                    return back()->with('error', '验证码错误');
                }

            } else {
                // 密码输入错误
                return back()->with('error', '密码错误');
            }

        } else {
            // 用户名有误
            return back()->with('error', '用户名有误');
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
