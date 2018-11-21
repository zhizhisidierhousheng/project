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

// 类别模块
	// 类别列表
	Route::resource('/admincates', 'Admin\CatesController');

// 商品模块
	// 商品列表
	Route::resource('/admingoods', 'Admin\AdmingoodsController');
	// Ajax删除商品
    Route::get('/admingoodsdel', 'Admin\AdmingoodsController@del');

//友情链接模块
	// 后台友情链接列表
	Route::resource('/adminlink','Admin\LinkController');
	// 后台友情链接管理
	Route::resource('/adminrelink','Admin\RelinkController');
	// 后台友情链接删除选中
	Route::get('/relinkchoosedel','Admin\RelinkController@choosedel');

//轮播图管理模块
	// 后台轮播图管理
	Route::resource('/adminlooppic','Admin\LooppicController');
	// 后台轮播图添加
	Route::get('/adminpicadd','Admin\LooppicController@adminpicadd');
	// 后台轮播图删除选中
	Route::get('/looppicchoosedel','Admin\LooppicController@choosedel');






// 后台首页
	Route::resource('/admin', 'Admin\AdminController');

});



// 前台注册
Route::resource('/register', 'Home\RegisterController');
// 发送手机验证码短信
Route::get('/codeget', 'Home\RegisterController@codeget');
// 验证手机验证码
Route::get('/checkcode', 'Home\RegisterController@checkcode');
// 检测用户名重复
Route::get('/registername', 'Home\RegisterController@registername');
// 检测手机号重复
Route::get('/registerphone', 'Home\RegisterController@registerphone');

// 前台登录和退出
Route::resource('/login', 'Home\LoginController');
// 前台登录验证码
Route::get('login/captcha/{tmp}', 'Home\LoginController@captcha');

// 忘记密码验证手机号
Route::get('/forget', 'Home\LoginController@forget');
// 校验手机号
Route::get('/forgetphone', 'Home\LoginController@forgetphone');
// 获取校验码
Route::get('/forgetcodeget', 'Home\LoginController@forgetcodeget');
// 接收重置密码验证短信方法
Route::get('/forgetcheckcode', 'Home\LoginController@forgetcheckcode');
// 加载重置密码模板
Route::post('/doforget', 'Home\LoginController@doforget');
// 重置密码方法
Route::post('/reset', 'Home\LoginController@reset');


// 前台中间件
Route::group([''], function () 
{ 
//会员中心
    Route::get('/home/userscenter', 'Home\UserscenterController@userscenter');
//会员商品收藏
    Route::resource('/home/userscollect', 'Home\UserscollectController');

//会员个人信息    
    //ajax修改个人信息
    Route::get('/home/ajaxinfo', 'Home\UsersinfoController@ajaxinfo');
    //获取验证码
    Route::get('/home/myphone/code', 'Home\UsersinfoController@phone');
    //比较验证码
    Route::get('/home/myphone/checkcode', 'Home\UsersinfoController@checkcode');
    //执行修改
    Route::get('/home/myphone/change', 'Home\UsersinfoController@change');
    //更绑手机步骤页
    Route::get('/home/myphone', 'Home\UsersinfoController@myphone');
    //发送邮件
    Route::get('/home/myemail/send', 'Home\UsersinfoController@change');
    //确认绑定
    Route::get('/home/myemail/upemail', 'Home\UsersinfoController@upemail');
    //更绑邮箱步骤页
    Route::get('/home/myemail', 'Home\UsersinfoController@myemail');
    Route::resource('/home/usersinfo', 'Home\UsersinfoController');
//会员订单
    Route::resource('/home/usersorder', 'Home\UsersorderController');
//收货地址
    Route::resource('/home/usersaddress', 'Home\UsersaddressController');

});

// 前台首页
Route::resource('/index', 'Home\HomeController');

// 前台友情链接
Route::resource('/link','Home\linkController');
// 前台购物车
Route::resource('/cart','Home\CartController');
// 前台购物车删除选中
Route::get('/cartchoosedel','Home\CartController@choosedel');
// 前台订单
Route::resource('/order','Home\OrderController');

