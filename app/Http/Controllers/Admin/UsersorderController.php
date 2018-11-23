<?php
// 订单管理模块
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; //引入DB类
use App\Models\Orders; //引入订单模型类

class UsersorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //后台订单列表页
        //搜索框值
        $oid = $request->input('oid');
        //获取订单信息
        $orders = DB::table("orders")
                      ->join("users", "users.id", "=", "orders.uid")
                      ->select("orders.*", "users.name")
                      ->where("orders.id", "like", "%" . $oid . "%")
                      ->paginate(10);
        //订单总数
        $num = Orders::where("id", "like", "%" . $oid . "%")->count();
        // dd($datemax);

        return view("Admin.Orders.usersorder", ["orders" => $orders, "num" => $num]);
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
        //后台订单详情
        //获取数据
        $data = DB::table("orders_info")->where("oid", "=", $id)->get();
        $address = DB::select("select * from orders as o,users_address as a where o.address_id = a.id")[0];
        //获取该订单的优惠券id
        $coupon = DB::table("orders")
                      ->join("coupon", "orders.coupon_id", "=", "coupon.id")
                      ->where("orders.id", "=", $id)
                      ->first();
        // dd($coupon);

        return view("Admin.Orders.ordersinfo", ['data' => $data, 'address' => $address, 'coupon' => $coupon]);
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

    public function updatestatus(Request $request)
    {
        //修改订单状态
        //获取订单id和修改状态
        $oid = request()->input('oid');
        $new_status = request()->input('status');
        //获取原本订单状态
        $old_status = DB::select("select status from orders where id = {$oid}")[0];
        if ($new_status >= $old_status->status) {
            //执行修改
            if (DB::update("update orders set status = {$new_status} where id = {$oid}")) {
                return response()->json(['msg' => 1, 'status' => '']);
            } else {
                return response()->json(['msg' => 2, 'status' => $old_status->status]);
            }
        } else {
            return response()->json(['msg' => 2, 'status' => $old_status->status]);
        }
    }
}
