<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserscommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //会员中心评价页
        $uid = getuid();
        //评价
        $com = DB::table('comment')
                   ->join('goods', 'goods.id', '=', 'comment.gid')
                   ->select('goods.pic as pic', 'comment.*')
                   ->where('comment.uid', '=', $uid)
                   ->orderBy('comment.inputtime', 'DESC')
                   ->paginate(6);

        //分类
        $cates = getcatesbypid(0);

        //获取头像
        $pic = DB::select("select pic from users_info where uid = :uid", ["uid" => $uid])[0];

        return view("Home.Users.userscomment", ["cates" => $cates, "pic" => $pic, "comment" => $com]);
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
        //删除评价
        if (DB::table('comment')->where('id', '=', $id)->delete()) {
            return redirect('/home/userscomment');
        } else {
            return redirect('/home/userscomment');
        }
    }
}
