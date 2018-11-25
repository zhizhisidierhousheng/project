<?php
// 管理员管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入DB,Hash
use DB;
use Hash;
// 引入校验类
use App\Http\Requests\AdminUserinsert;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载管理员列表
        $user = DB::table('admin_users')->orderBy('id','asc')->get();
        return view('Admin.Adminuser.index', ['user' => $user]);
    }

    // 分配角色
    public function rolelist($id)
    {
        // 获取用户的信息
        $info = DB::table('admin_users')->where('id', '=', $id)->first();
        // 获取所有的角色
        $role = DB::table('role')->get();
        // 获取当前用户的角色信息
        $data = DB::table('user_role')->where('uid', '=', $id)->get();
        // 判断
        if (count($data)) {
            // 当前分配的用户有角色信息
            // 遍历
            foreach ($data as $v) {
                // 把角色rid存储在数组里
                $rids[] = $v->rid;
            }
            return view('Admin.Adminuser.rolelist', ['info' => $info, 'role' => $role, 'rids' => $rids]);

        } else {
            // 当前用户没有角色信息
            // 加载模板
            return view('Admin.Adminuser.rolelist', ['info' => $info, 'role' => $role, 'rids' => array()]);
        }
        
    }

    // 保存角色
    public function saverole(Request $request)
    {
        // 获取当前管理员id
        $id = $_POST['uid'];
        // user_role 数据表插入数据  uid  rid 
        if (empty($_POST['rid'])) {
            // 获取管理员id
            $uid = $request->input('uid');
            // 删除当前用户已有的角色信息
            DB::table('user_role')->where('uid', '=', $uid)->delete();

        } else {

            // 获取管理员id
            $uid = $request->input('uid');
            // 获取rid
            $rid = $_POST['rid'];
            // 删除当前用户已有的角色信息
            DB::table('user_role')->where('uid', '=', $uid)->delete();
            foreach ($rid as $key => $value) {
                // 封装需要插入的数据
                $data['uid'] = $uid;
                $data['rid'] = $value;
                // 执行插入
                DB::table('user_role')->insert($data);
            }
        }
        // 转回分配角色页面并提示信息
        return redirect("/rolelist/{$id}")->with('success', '角色分配成功');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 管理员添加
        return view('Admin.Adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加方法
    public function store(AdminUserinsert $request)
    {   
        // 忽略掉信息
        $data = $request->except('repassword', '_token');
  
        // 密码加密
        $data['password'] = Hash::make($data['password']);

        if (DB::table('admin_users')->insert($data)) {
            // 默认超级管理员
            $id = DB::getPdo()->lastInsertId();
            DB::table('user_role')->insert(['uid' => $id, 'rid' => 1]);
            return redirect('/adminuser')->with('success', '添加成功');
        } else {
            return redirect('/adminuser/create')->with('error', '添加失败');
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
    // 修改方法
    public function edit($id)
    {
        // 获取需要修改的数据
        $user = DB::table('admin_users')->where('id', '=', $id)->first();
        // 加载模板
        return view('Admin.Adminuser.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(AdminUserinsert $request, $id)
    {
        // 忽略掉信息
        $data = $request->except(['_token', '_method', 'repassword']);
        // 加密密码
        $data['password'] = Hash::make($data['password']);
        if (DB::table('admin_users')->where('id', '=', $id)->update($data)) {
            return redirect('/adminuser')->with('success', '修改成功');
        } else {
            return redirect("/adminuser/{id}/edit")->with('error', '修改失败');
        }
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

    // Ajax删除
    public function del(Request $request)
    {
        //获取参数id
        $id = $request->input('id');
        $data = DB::table('admin_users')
                   ->join('user_role', 'admin_users.id', '=', 'user_role.uid')
                   ->where('id', '=', $id)
                   ->limit(1)
                   ->first();
                   // dd($data);
        if (!empty($data)){           
            if ($data->rid != 1) {
                if (DB::table('admin_users')->where('id', '=', $id)->delete()) {
                    //json格式
                    return response()->json(['msg' => 1]);
                } else {
                    return response()->json(['msg' => 0]);
                }
            }
        }
        return response()->json(['msg' => 0]);
    }
}
