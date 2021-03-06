<?php
// 评论控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取关键字
        $goods = $request->input('goods');
        $users = $request->input('users');
        // 查询评论信息
        $data = DB::table('comment')->select('comment.*', 'goods.name as gname', 'goods.pic', 'users.name as name')->join('users', 'users.id', '=', 'comment.uid')->join('goods', 'goods.id', '=', 'comment.gid')->where('users.name', 'like', '%'.$users.'%')->where('goods.name', 'like', '%'.$goods.'%')->paginate(10);
        // 加载评论列表
        return view('Admin.Comment.comment', ['data' => $data]);
    }
}
