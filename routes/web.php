<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 后台登录和退出
Route::resource('/adminlogin', 'Admin\AdminloginController');
// 验证码方法调用
Route::get('adminlogin/captcha/{tmp}', 'Admin\AdminloginController@captcha');


// 后台中间件限制不登录不能访问
Route::group(['middleware' => 'adminlogin'], function () 
{

// 管理员模块
	// 后台管理员管理
	Route::resource('/adminuser', 'Admin\AdminuserController');
	// Ajax删除管理员
    Route::get('/adminuserdel', 'Admin\AdminuserController@del');
	// 管理员分配角色
	Route::get('/rolelist/{id}', 'Admin\AdminuserController@rolelist');
	// 保存管理员角色
	Route::post('/saverole', 'Admin\AdminuserController@saverole');

	// 角色列表
	Route::resource('/adminrolelist', 'Admin\RolelistController');
	// Ajax删除角色
	Route::get('/authroledel', 'Admin\RolelistController@del');
	// 角色分配权限
	Route::get('/authrole/{id}', 'Admin\RolelistController@auth');	
	// 保存角色权限
	Route::post('/saveauth', 'Admin\RolelistController@saveauth');

// 会员模块
	// 会员列表
	Route::resource('/users', 'Admin\UsersController');
	// 会员收货地址
	Route::get('/usersaddress/{id}', 'Admin\UsersController@address');

// 订单模块
	// ajax修改订单状态
	Route::get('/admin/orderstatus', 'Admin\UsersorderController@updatestatus');
	// 订单列表
	Route::resource('/admin/usersorder', 'Admin\UsersorderController');

// 广告模块
	//ajax修改广告状态
	Route::get('/admin/advstatus', 'Admin\AdvController@updatestatus');
	// 广告列表
	Route::resource('/admin/adv', 'Admin\AdvController');

// 公告模块
	// 公告列表
	Route::resource('/admin/notice', 'Admin\NoticeController');

// 后台首页
	Route::resource('/admin', 'Admin\AdminController');
});

//会员中心
Route::get('/home/userscenter', 'Home\UserscenterController@userscenter');
//会员商品收藏
Route::resource('/home/userscollect', 'Home\UserscollectController');
//ajax修改个人信息
Route::get('/home/ajaxinfo', 'Home\UsersinfoController@ajaxinfo');
//会员个人信息
Route::get('/home/myphone', 'Home\UsersinfoController@myphone');
Route::get('/home/myphone/code', 'Home\UsersinfoController@phone');
Route::get('/home/myphone/change', 'Home\UsersinfoController@change');
Route::get('/home/myemail', 'Home\UsersinfoController@myemail');
Route::resource('/home/usersinfo', 'Home\UsersinfoController');
//会员订单
Route::resource('/home/usersorder', 'Home\UsersorderController');
//收货地址
Route::resource('/home/usersaddress', 'Home\UsersaddressController');

// 前台注册
Route::resource('/register', 'Home\RegisterController');
// 发送手机验证码短信  未完成
Route::get('/register/phone', 'Home\RegisterController@sendphone');

// 前台登录和退出
Route::resource('/login', 'Home\LoginController');
// 前台登录验证码
Route::get('login/captcha/{tmp}', 'Home\LoginController@captcha');

// 前台首页
Route::get('/index', function () {
	return view('welcome');
});