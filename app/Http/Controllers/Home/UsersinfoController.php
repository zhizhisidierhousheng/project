<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类
use App\Models\Usersinfo;
use App\Models\Users;

class UsersinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = 1;
        //会员个人信息页
        $info = DB::table("users")
                    ->join("users_info", "users.id", "=", "users_info.uid")
                    ->where("users.id", "=", $uid)
                    ->first();
        $info->birthday = date('Y-m-d', strtotime($info->birthday));
        
        return view("Home.Users.usersinfo", ["info" => $info]);
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
        echo $id;
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
        //会员头像修改
        $pic = $request->input('pic');
        //获取旧头像
        $oldfile = DB::select("select pic from users_info where uid = :uid", ["uid" => $id])[0];
        $dir = public_path() . dirname($oldfile->pic);
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $pic, $result)) {
            //获取图片后缀
            $type = $result[2];
            //定义图片路径
            $savepath = "/uploads/users/" . date('Ymd',time()) . "/";
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            if (!file_exists(public_path() . $savepath)) {
                mkdir(public_path() . $savepath, 0700);
            }
            //新头像图片名称
            $newfile = "username" . time() . ".{$type}";
            //将图片存储在上传到自定义目录中
            if (file_put_contents(public_path() . $savepath . $newfile, base64_decode(str_replace($result[1], '', $pic)))) {
                $data = ["pic" => $savepath . $newfile];
                //执行头像信息更新
                if (DB::table("users_info")->where("uid", "=", $id)->update($data)) {
                    //删除旧头像，但不删除默认头像
                    if ($oldfile->pic != '/static/home/images/myhead.jpg') {
                        unlink(public_path() . $oldfile->pic);
                        $arr = array_diff(scandir($dir), array('..', '.'));
                        if (empty($arr)) {
                            rmdir($dir);
                        }
                    }
                    return redirect("/home/usersinfo");
                } else {
                    return redirect("/home/usersinfo");
                }
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

    public function ajaxinfo(Request $request)
    {
        $id = 1;
        //获取修改数据
        $data = $request->only('username', 'sex', 'birthday');
        $data['birthday'] = strtotime($data['birthday']);
        //获取原数据
        $info = Users::find($id)->info;
        //执行修改
        if (Usersinfo::where("uid", "=", $id)->update($data)) {
            return response()->json(['msg' => 1]);
        } else {
            return response()->json(['msg' => 2, 'username' => $info->username, 'birthday' => date('Y-m-d', $info->birthday), 'sex' => $info->sex]);
        }
    }

    public function myphone()
    {
        //修改手机号页
        return view("Home.Users.usersphone");
    }

    public function myemail()
    {
        //修改邮箱页
        return view("Home.Users.usersemail");
    }
}
