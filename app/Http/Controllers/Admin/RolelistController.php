<?php
// 角色管理
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 角色列表页
    public function index()
    {
        // 获取所有角色
        $role = DB::table('role')->get();

        // 加载模板
        return view('Admin.Rolelist.index', ['role' => $role]);
    }

    // 分配权限
    public function auth($id)
    {
        // dd($id);
        // 获取当前操作的角色信息
        $role = DB::table('role')->where('id', '=', $id)->first();
        // 获取所有的权限信息
        $node = DB::table('node')->get();
        // 获取当前角色已有的权限信息
        $data = DB::table('role_node')->where('rid', '=', $id)->get();
        // dd($data);
        // 判断
        if (count($data)) {
            //当前角色有权限信息
            //遍历权限信息
            foreach ($data as $v) {
                $nid[] = $v->nid;
            }
            return view('Admin.Rolelist.auth', ['role' => $role, 'node' => $node, 'nid' => $nid]);
        } else {
            //当前角色没有权限信息
            //加载模板
            return view('Admin.Rolelist.auth', ['role' => $role, 'node' => $node, 'nid' => array()]);
        }
    }

    //保存角色权限
    public function saveauth(Request $request)
    {
        // 获取当前角色id
        $rid = $_POST['rid'];
        // 向role_node 插入数据
        // 判断是否有权限赋予
        if (empty($_POST['nid'])) {
            // 获取角色id
            $rid = $request->input('rid');  
            // 删除当前角色已有的权限信息
            DB::table("role_node")->where("rid", '=', $rid)->delete();

        } else {
            
            // 获取角色id
            $rid = $request->input('rid');
            // 获取分配的权限id
            $nid = $_POST['nid'];
            // 删除当前角色已有的权限信息
            DB::table("role_node")->where("rid", '=', $rid)->delete();
            // 遍历给的权限
            foreach ($nid as $key => $value) {
                // 封装需要插入的数据
                $data['rid'] = $rid;
                $data['nid'] = $value;
                DB::table("role_node")->insert($data);
            }
        }
        // 转回权限分配页并提示信息
        return redirect("/authrole/{$rid}")->with('success', '权限分配成功');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 角色添加
    public function create()
    {
        // 角色添加页面
        return view('Admin.Rolelist.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加方法
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // 添加入数据库
        if (DB::table('role')->insert($data)) {
            return redirect('/adminrolelist')->with('success', '添加成功');
        } else {
            return redirect('/adminrolelist/create')->back()->with('error', '添加失败');
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
    // 修改角色
    public function edit($id)
    {
        // 获取需要修改的数据
        $role = DB::table('role')->where('id', '=', $id)->first();
        // 加载模板
        return view('Admin.Rolelist.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改角色名
    public function update(Request $request, $id)
    {
        // 忽略掉信息
        $data = $request->except(['_token', '_method']);
        // 获取修改的name
        $name = $request->input('name');
        // 不修改直接返回列表页
        if (DB::table('role')->where('name', '=', $name)->first()) {
            // 返回列表页
            return redirect('/adminrolelist')->with('error', '修改失败'); 
        } else {
            if (DB::table('role')->where('id', '=', $id)->update($data)) {
                return redirect('/adminrolelist')->with('success', '修改成功');
            } else {
                return redirect('/adminrolelist/{id}/edit')->with('error', '修改失败');
            }
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

        if (DB::table('role')->where('id', '=', $id)->delete()) {
            //json格式
            return response()->json(['msg' => 1]);
        } else {
            return response()->json(['msg' => 0]);
        }
    }
}
