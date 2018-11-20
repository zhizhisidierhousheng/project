<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Users;

class UsersaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //会员收货地址
        $uid = 1;
        //获取头像
        $info = Users::find($uid)->info;
        $addr = DB::table("users_address")->where("uid", "=", $uid)->get();

        return view("Home.Users.usersaddress", ["pic" => $info->pic, "address" => $addr]);
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
        //获取id
        $uid = 1;
        //执行地址添加
        //获取数据
        $data = $request->only('phone', 'name', 'address', 'postacode');
        $data['area'] = implode('', $request->only('s_province', 's_city', 's_county'));
        $data['uid'] = $uid;
        //获取地址数量
        $num = DB::select("select count(*) as num from users_address where uid = :uid", ["uid" => $uid])[0];
        //判断是否作为默认地址
        if ($num->num == 0) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        if (DB::table("users_address")->insert($data)) {
            return redirect("/home/usersaddress");
        } else {
            return redirect("/home/usersaddress");
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
        //地址修改页
        $uid = 1;
        //获取头像
        $info = Users::find($uid)->info;
        //获取需修改的那条地址数据
        $data = DB::select("select * from users_address where id = :id", ["id" => $id])[0];
        $address = $data->area;
        preg_match('/(.*?(省|自治区|北京市|天津市|重庆市|上海市|香港市|澳门市))+(.*?(市|州|区))+(.*?(镇|县|区))/', $address, $matches);
        //省级
        $province = $matches[count($matches) - 6];
        //市级
        $city = $matches[count($matches) - 4];
        //区级
        $area = $matches[count($matches) - 2];

        return view("Home.Users.editaddress", ["pic" => $info->pic, "data" => $data, "province" => $province, "city" => $city, "county" => $area]);
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
        //执行地址修改
        $data = $request->only('address', 'phone', 'name', 'postacode');
        $data['area'] = implode('', $request->only('s_province', 's_city', 's_county'));
        //获取默认地址
        $old = DB::table("users_address")->where("status", "=", 0)->first();
        if (!$request->has('status')) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        // dd($data);
        if (DB::table("users_address")->where("id", "=", $id)->update($data)) {
            if (count($old) > 0) {
                if (($old->id != $id) && ($data['status'] == 0)) {
                    DB::table("users_address")->where("id", "=", $old)->update(["status" => 1]);
                }
            }
            return redirect("/home/usersaddress");
        } else {
            return redirect("/home/usersaddress");
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
        $uid = 1;
        //执行地址删除
        $status = DB::select("select status from users_address where id = :id", ["id" => $id])[0];
        // dd($status);
        if (DB::table("users_address")->where("id", "=", $id)->delete()) {
            //判断是否是默认地址
            if ($status->status == 0) {
                //获取下一个地址的id
                $nextid = DB::select("select id from users_address where uid = :uid order by id limit 1", ["uid" => $uid])[0];
                DB::table("users_address")->where("id", "=", $nextid->id)->update(["status" => 0]);
            }
            return redirect("/home/usersaddress");
        } else {
            return redirect("/home/usersaddress");
        }
    }
}
