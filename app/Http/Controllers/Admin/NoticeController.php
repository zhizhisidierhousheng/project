<?php
// 公告模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //公告列表页
        //获取关键字
        $title = $request->input('title');
        $content = $request->input('content');
        //获取公告信息
        $data = DB::table("notice")
                    ->where("title", "like", "%" . $title . "%")
                    ->where("content", "like", "%" . $content . "%")
                    ->paginate(10);
        // dd($datemax);

        return view("Admin.Notices.notice", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //公告添加页
        return view("Admin.Notices.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行公告添加
        //获取信息
        $data = $request->except('_token');
        $data['inputtime'] = date('Y-m-d H:i:s', time());
        if (DB::table("notice")->insert($data)) {
            return redirect("/admin/notice")->with("success", "添加成功");
        } else {
            return redirect("/admin/notice/create")->with("error", "添加失败");
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
        //执行公告删除
        if ($request->has('notices')) {
            //批量删除公告
            $notices = $request->only('notices')['notices'];
            if (DB::table("notice")->whereIn("id", $notices)->delete()) {
                return redirect('/admin/notice')->with('success', '删除成功');
            } else {
                return redirect('/admin/notice')->with('error', '删除失败');
            }
        } elseif($id) {
            //删除单条公告
            if (DB::table("notice")->where("id", "=", $id)->delete()) {
                return redirect('/admin/notice')->with('success', '删除成功');
            } else {
                return redirect('/admin/notice')->with('error', '删除失败');
            }
        } else {
            return redirect('/admin/notice');
        }
    }
}
