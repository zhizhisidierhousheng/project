<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//引入配置类 上传文件
use Config;

//导入模型类
use App\Models\Shops;
use App\Models\Goods;

//导入表单校验类
use App\Http\Requests\AdminCategoryinsert;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	//获取所有的分页
    	//获取总数据
    	$num=DB::table("category")->count();
    	if ($num==0) {
    		return view("Admin.Shop.empty");
    	}else{ 


    	//每页显示数据总条数
    	$rev=6;
    	//获取最大的页数
    	$maxpage=ceil($num/$rev);
    	//echo $maxpage;exit;

    	//for
    	for ($i=1; $i <=$maxpage ; $i++) { 
    		$p[$i]=$i;
    	}
    	//echo "<pre>";
    	//var_dump($p);exit;

    	//echo "string";
    	$page=$request->input('page');
    	//echo $page;

    	//判断
    	if(empty($page)){ 
    		$page=1;
    	}

    	$offset=($page-1)*$rev;
    	$sql="select * from category limit {$offset},{$rev}";
    	//执行SQL语句
    	$data=DB::select($sql);

    	//request->ajax判断请求是否为ajax
    	if ($request->ajax()) {
    		//echo $page;exit;
    		return view("Admin.Shop.page",['data'=>$data]);
    	}

    	//返回第一条数据


    	//获取shops模型数据
    	$category=Shops::get();
    	//dd($data);



    	
    	//dd($num);

    	//获取搜索的关键字
    	$k=$request->input("keyword");


        //echo "index";
        //$category=DB::table("category")->get();
        //$category=DB::table("category")->select(DB::raw('*,concat(path,",",id)as paths'))->orderBy("paths")->paginate(6);
        $category=DB::table("category")->select(DB::raw('*,concat(path,",",id)as paths'))->where("name","like","%".$k."%")->orderBy("paths")->paginate(20);
        
        //遍历数据
        foreach ($category as $key => $value) {
        	//echo $value->path."<br />";
        	//转换为数组
        	$arr=explode(",", $value->path);
        	//获取逗号个数
        	$len=count($arr)-1;
        	//重复字符串函数
        	$category[$key]->name = str_repeat("--| ", $len).$value->name;
        }

        
        return view("Admin.Shop.index",['category'=>$category,"request"=>$request->all(),"num"=>$num,"p"=>$p,"data"=>$data]);
   		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //调整类别顺序 添加分隔符
    public static function getcategory()
    { 
    	 $category=DB::table("category")->select(DB::raw('*,concat(path,",",id)as paths'))->orderBy("paths")->get();
    	//遍历数据
        foreach ($category as $key => $value) {
        	//echo $value->path."<br />";
        	//转换为数组
        	$arr=explode(",", $value->path);
        	//获取逗号个数
        	$len=count($arr)-1;
        	//重复字符串函数
        	$category[$key]->name = str_repeat("--| ", $len).$value->name;
        }

        return $category;
    }

    public function create()
    {

    	
    	$category=self::getcategory();
 
    	return view("Admin.Shop.add",['data'=>$category]);
    	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryinsert $request)
    {
        //dd($request->all());
        $data=$request->except("_token");
        $data['status']=1;
       
        //dd($data);
        //获取pid值
        $pid=$request->input("pid");

        //判断pid的值是否为零
        if ($pid==0) {
        	//顶级分类
        	//dd($data);
        	$data['path']="0";

       }else{ 
        	//子级分类
        	//dd($data);
        	//$data['path']=父类path.",".父类id;
        	$info=DB::table("category")->where("id","=",$pid)->first();
        	$data['path']=$info->path.",".$info->id;
       }

       //dd($data);

        //执行插入
        if(DB::table('category')->insert($data)){ 
        	return redirect("/adminshop/create")->with("success","添加成功");
        }else{ 
        	return redirect("/adminshop/create")->with("error","添加失败");
        	return redirect("/adminshop/create")->with("error","添加失败");
        	

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
        //获取商品详情
        //echo $id;
        $info=Shops::find($id)->info;
        //dd($info);
        //echo "<pre>";
        //var_dump($info);exit;
        if ($info==null){
        	return view("Admin.Goods.emptyinfo");
        }else{ 
        	return view("Admin.Goods.info",['info'=>$info]);
        }


        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo $id;
        $id=$id;
        $data=DB::table("category")->where("id","=",$id)->first();
        //模版
        return view("Admin.Shop.updata",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryinsert $request,$id)
    {
        
        // echo " update";
        $data=$request->except(['_token','_method']);
       //dd($data);
        if(DB::table("category")->where("id","=",$id)->update($data)){
            return redirect("/adminshop")->with("success","修改成功");
        }else{
            return redirect("/adminshop/{{id}}/edit")->with("error","修改失败");
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
        $id=$id;
        //echo $id;
        //获取当前类别下子类个数
        $res=DB::table("category")->where("pid","=",$id)->count();
        if($res>0){ 
        	//如果当前分类下有子类信息，当前类别不能删除
        	return redirect("/adminshop")->with("error","温馨提示:请删除该类别下的其它商品");
        }
        
        //如果当前分类下没有子类信息 当前分类能删除
        if (DB::table("category")->where("id","=",$id)->delete()) {
            return redirect("/adminshop")->with('success','删除成功');
        }else{
            return redirect("/adminshop")->with("error","删除失败");
        }
        
    }


    //商品详情添加
    public function add($id)
    { 
    	//echo "add";
    	//dd($request->all());
    	$id=$id;
    	//echo $id;exit;
    	$data=DB::table("category")->where("id","=",$id)->first();
    	$res=DB::table("goods")->where("cid","=",$id)->first();

    	//echo "<pre />";
    	//var_dump($res);exit;

    	if($data->status==1 && $data->pid != 0){ 
    		if($res==null){ 
    			return view('Admin.Info.add',['data'=>$data]);
    		}else{ 
    			return redirect("/adminshop")->with("error","温馨提示:该商品已添加,请点击商品详情");
    		}

    		//return view('Admin.Info.add',['data'=>$data]);

    	}else{ 
    		return redirect("/adminshop")->with("error","温馨提示:该商品为顶级分类不可添加,或者请先修改状态");
    	}

    	

    	
    	
    }


    //执行商品详情添加
    public function doadd(Request $request)
    { 
    	$data=$request->except("_token");
    	//dd($request->all());
    	//dd($data);


    	//获取关联数据表
    	$goods = new Goods;
    	$res = $goods->addFile($request);
    	if (is_string($res)) { 
    		return redirect("/adminshop")->with("error", $res);
    	} else if ($res === true) { 
    		return redirect("/adminshop")->with("success","添加成功");
    	} else { 
    		return redirect("/adminshop")->with("error","添加失败");
    	}



    	//执行文件上传
    	/*if($request->hasFile('pic')){ 
    		//初始化名字,获取后缀
    		$name=time()+rand(1,10000);
    		$ext=$request->file('pic')->getClientOriginalExtension();
    		//移动到指定的目录
    		$request->file("pic")->move(Config::get('app.uploads'),$name.".".$ext);

    		//初始化$data
    		$data['pic']=trim(Config::get('app.uploads')."/".$name.".".$ext,".");
    		//dd($data);

    		//执行数据亏的插入
    		if(DB::table("goods")->insert($data)){ 
    			return redirect("/adminshop")->with("success","添加成功");
    		}else{ 
    			return redirect("/adminshop")->with("error","添加失败");
    		}

    	}*/

    	

    	//return "123";
    	
    }


   //商品详情删除
   public function del($id)
   {
    	$id=$id;
    	//echo $id;

    	$info=DB::table("goods")->where("id","=",$id)->first();

    	//echo "del";

    	if (DB::table("goods")->where("id","=",$id)->delete()) {
    		//删除图片
    		unlink(".".$info->pic);
            return redirect("/adminshop")->with('success','删除成功');
        }else{
            return redirect("/adminshop")->with("error","删除失败");
        }



    }




    //商品详情修改
    public function edits($id)
    { 
    	$id=$id;
    	//echo "edit";
    	//echo $id;
    	//通过id找数据
    	$data=DB::table("goods")->where("id","=",$id)->first();
    	//echo "<pre />";
    	//var_dump($data);
    	return view("Admin.Info.update",['data'=>$data]);

    }



    //执行商品详情修改
    public function updates(Request $request,$id)
    { 
    	//$id=$id;
    	
    	$data=$request->except("_token");

    	//dd($data);
    	//$id=$id;
    	//$info=DB::table("goods")->where("id","=",$id)->first();
    	

    	if($request->hasFile('pic')){ 
    		//初始化名字,获取后缀
    		$name=time()+rand(1,10000);
    		$ext=$request->file('pic')->getClientOriginalExtension();
    		//移动到指定的目录
    		$request->file("pic")->move(Config::get('app.uploads'),$name.".".$ext);

    		//初始化$data
    		$data['pic']=trim(Config::get('app.uploads')."/".$name.".".$ext,".");
    		//dd($data);

    		//执行数据亏的插入
    		if(DB::table("goods")->where("id","=",$id)->update($data)){
    			//删除原图
    			//unlink(".".$info->pic);
    			return redirect("/adminshop")->with("success","修改成功");
    		}else{ 
    			return redirect("/adminshop")->with("error","修改失败");
    		}
    	
    	}else{ 
    		if(DB::table("goods")->where("id","=",$id)->updade($data)){ 
				return redirect("/adminshop")->with("success","修改成功");
    		}else{ 
    			return redirect("/adminshop")->with("error","修改失败");
    		}
    	}



    }





}
