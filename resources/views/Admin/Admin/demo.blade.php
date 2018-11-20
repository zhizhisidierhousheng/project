@extends("Admin.AdminPublic.public")
@section("admin")

<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin">
                淘食
            </a>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">
                &#xe667;
            </a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>
                        欢迎你 {{session('aname')}}
                    </li>
                    <li class="dropDown dropDown_hover">
                        <a href="javascript:void(0)" class="dropDown_A"> {{session('name')}} </a>
                    </li>
                    <li id="Hui-msg">
                        <a href="/adminlogin" title="退出">退出</a>
                    </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover">
                        <a href="javascript:;" class="dropDown_A" title="换肤">
                            <i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i>
                        </a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li>
                                <a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-val="blue" title="蓝色">蓝色</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-val="green" title="绿色">绿色</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-val="red" title="红色">红色</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-val="yellow" title="黄色">黄色</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-val="orange" title="橙色">橙色</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
            <dt>
                <i class="Hui-iconfont">&#xe62d;</i>
                管理员管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-title="管理员列表" href="javascript:void(0)" data-href="/adminuser">管理员列表</a>
                    </li>
                    <li>
                        <a data-title="管理员添加" href="javascript:void(0)" data-href="/adminuser/create">管理员添加</a>
                    </li>
                    <li>
                        <a data-title="角色列表" href="javascript:void(0)" data-href="/adminrolelist">角色列表</a>
                    </li>
                    <li>
                        <a data-title="角色添加" href="javascript:void(0)" data-href="/adminrolelist/create">角色添加</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-member">
            <dt>
                <i class="Hui-iconfont">&#xe60d;</i>
                会员管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/users" data-title="会员列表" href="javascript:void(0)">会员列表</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt>
                <i class="Hui-iconfont">&#xe620;</i> 
                类别管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/admincates" data-title="类别列表" href="javascript:void(0)"> 类别列表</a>
                    </li>
                    <li>
                        <a data-href="/admincates/create" data-title="类别添加" href="javascript:void(0)"> 类别添加</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt>
                <i class="Hui-iconfont">&#xe620;</i> 
                商品管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/admingoods" data-title="商品列表" href="javascript:void(0)"> 商品列表</a>
                    </li>
                    <li>
                        <a data-href="/admingoods/create" data-title="商品添加" href="javascript:void(0)"> 商品添加</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt>
                <i class="Hui-iconfont">&#xe6f1;</i>
                友情链接管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/adminlink" data-title="链接列表" href="javascript:void(0)">链接列表</a>
                    </li>
                    <li>
                        <a data-href="/adminrelink" data-title="链接管理" href="javascript:void(0)">链接管理</a>
                    </li>
                </ul>
            </dd>
        </dl>
		<dl id="menu-picture">
            <dt>
                <i class="Hui-iconfont">&#xe613;</i>
                轮播图管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/adminlooppic" data-title="轮播图管理" href="javascript:void(0)">轮播图管理</a>
                    </li>
                </ul>
            </dd>
        </dl>
		<dl>
            <dt>
                <i class="Hui-iconfont">&#xe627;</i> 
                订单管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/admin/usersorder" data-title="订单列表" href="javascript:void(0)">订单列表</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>
                <i class="Hui-iconfont">&#xe622;</i> 
                商品评价
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/comment" data-title="评价列表" href="javascript:void(0)">评价列表</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>
                <i class="Hui-iconfont">&#xe62f;</i> 
                广告管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/admin/adv" data-title="广告列表" href="javascript:void(0)">广告列表</a>
                    </li>
                    <li>
                        <a data-href="/admin/adv/create" data-title="广告添加" href="javascript:void(0)">广告添加</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>
                <i class="Hui-iconfont">&#xe62f;</i> 
                公告管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="/admin/notice" data-title="公告列表" href="javascript:void(0)">公告列表</a>
                    </li>
                    <li>
                        <a data-href="/admin/notice/create" data-title="公告添加" href="javascript:void(0)">公告添加</a>
                    </li>
                </ul>
            </dd>
        </dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="后台首页" data-href="welcome.html">后台首页</span>
					<em></em>
				</li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
				<i class="Hui-iconfont">&#xe6d4;</i>
			</a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
				<i class="Hui-iconfont">&#xe6d7;</i>
			</a>
		</div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe src="/admin/create" scrolling="yes" frameborder="0">
				
					
			</iframe>
		</div>
	</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
	</ul>
</div>

@endsection
@section('title', '后台')