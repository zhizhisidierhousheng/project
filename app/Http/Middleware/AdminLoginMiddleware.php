<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // $request  请求报文 请求对象
    public function handle($request, Closure $next)
    {
        // 判断过滤规则
        // 检测是否具有登录用户名的session信息
        if ($request->session()->has('name')) {
            //获取访问模块的控制器和方法
            $actions = explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName = $actions[count($actions) - 2] == 'Controllers'?null:$actions[count($actions) - 2];
            $func = explode('@', $actions[count($actions) - 1]);
            //控制器名
            $controllerName = $func[0];
            //方法
            $actionName = $func[1];
            //4.权限对比
            //获取登录用户的权限信息
            $nodelist = session('nodelist');
            if (empty($nodelist[$controllerName]) || !in_array($actionName, $nodelist[$controllerName])) {
                return redirect("/admin/create")->with('error', '抱歉,您没有权限访问该模块,请联系超级管理员');
            }
            //执行下一个请求
            return $next($request);
        } else {
            return redirect("/adminlogin");
        }
       
    }
}
