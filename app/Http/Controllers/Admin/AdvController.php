<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\AdvInsert;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //广告列表页
        //获取关键字
        $id = $request->input('id');
        $title = $request->input('title');
        $dcr = $request->input('dcr');
        $url = $request->input('url');
        // dd($keyword);
        //获取广告信息
        $advs = DB::table("adv")
                    ->where("id", "like", "%" . $id . "%")
                    ->where("title", "like", "%" . $title . "%")
                    ->where("dcr", "like", "%" . $dcr . "%")
                    ->where("url", "like", "%" . $url . "%")
                    ->paginate(10);
        // dd($advs);
        
        return view("Admin.Advs.adv", ["advs" => $advs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载广告添加页面
        return view("Admin.Advs.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvInsert $request)
    {
        //执行广告添加
        $data = $request->except('uploadfile-1', '_token');
        $data['inputtime'] = time();
        if ($request->hasFile('pic')) {
            //文件名
            $file = 'GGPIC' . time() . rand(1, 10000);
            //后缀
            $ext = $request->file('pic')->getClientOriginalExtension();
            //保存路径
            $savepath = "/uploads/advpic/" . date('Ymd');
            $request->file('pic')->move('.' . $savepath, $file . '.' . $ext);
            $data['pic'] = $savepath . '/' . $file . '.' . $ext;
            // dd($data);
            if (DB::table("adv")->insert($data)) {
                return redirect("/admin/adv")->with("success", "添加成功");
            } else {
                return redirect("/admin/adv/create")->with("error", "添加失败");
            }
        } else {
            return redirect("/admin/adv");
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
        //修改广告信息
        $data = DB::select("select * from adv where id = :id", ["id" => $id])[0];
        $path  = public_path();
        // dd($data);

        return view("Admin.Advs.edit", ["data" => $data, "path" => $path]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvInsert $request, $id)
    {
        //执行广告修改
        $data = $request->except('uploadfile-1', '_token', '_method');
        if ($request->hasFile('pic')) {
            //文件名
            $file = 'GGPIC' . time() . rand(1, 10000);
            //后缀
            $ext = $request->file('pic')->getClientOriginalExtension();
            $savepath = "/uploads/advpic/" . date('Ymd');
            //保存路径
            $request->file('pic')->move('.' . $savepath, $file . '.' . $ext);
            $data['pic'] = $savepath . '/' . $file . '.' . $ext;
            //获取旧图片信息
            $pic = DB::table("adv")->where("id", "=", $id)->first();
            $dir = public_path() . dirname($pic->pic);
            if (DB::table("adv")->where("id", "=", $id)->update($data)) {
                unlink(public_path() . $pic->pic);
                $arr = array_diff(scandir($dir), array('..', '.'));
                if (empty($arr)) {
                    rmdir($dir);
                }
                return redirect("/admin/adv")->with("success", "修改成功");
            } else {
                return redirect("/admin/adv/{$id}/edit")->with("error", "修改失败");
            }
        } else {
            return redirect("/admin/adv");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->has('advs')) {
            //批量删除广告
            $advs = $request->only('advs')['advs'];
            $pic = DB::table('adv')->whereIn('id', $advs)->get();
            if (DB::table("adv")->whereIn("id", $advs)->delete()) {
                foreach ($pic as $row) {
                    $dir = public_path() . dirname($row->pic);
                    unlink(public_path() . $row->pic);
                    $arr = array_diff(scandir($dir), array('..', '.'));
                    if (empty($arr)) {
                        rmdir($dir);
                    }
                    
                }
                return redirect('/admin/adv')->with('success', '删除成功');
            } else {
                return redirect('/admin/adv')->with('error', '删除失败');
            }
        } elseif($id) {
            //删除单条广告
            $pic = DB::table("adv")->where("id", "=", $id)->first();
            $dir = public_path() . dirname($pic->pic);
            if (DB::table("adv")->where("id", "=", $id)->delete()) {
                unlink(public_path() . $pic->pic);
                $arr = array_diff(scandir($dir), array('..', '.'));
                if (empty($arr)) {
                    rmdir($dir);
                }
                return redirect('/admin/adv')->with('success', '删除成功');
            } else {
                return redirect('/admin/adv')->with('error', '删除失败');
            }
        } else {
            return redirect('/admin/adv');
        }
    }

    public function updatestatus(Request $request)
    {
        //修改广告状态
        $id = $request->input('id');
        $status = $request->input('status');
        if (DB::table("adv")->where("id", "=", $id)->update(["status" => $status])) {
            return response()->json(['msg' => 1]);
        } else {
            return response()->json(['msg' => 0]);
        }
    }
}
