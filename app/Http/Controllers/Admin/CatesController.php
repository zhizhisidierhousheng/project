<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //调整类别顺序
    public function getCate(){
        //原始的方法 DB::raw
        $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$this->request->input('keywords').'%')->orderBy('paths')->paginate(10);
        //遍历
        foreach($list as $key=>$value){
            //把字符串转换为数组
            $arr = explode(',', $value->path);
            // var_dump($arr);
            //获取数组的长度
            $len = count($arr);
            // var_dump($len);
            //获取逗号的个数
            $dlen = $len-1;
            // str_repeat 重复字符串
            $list[$key]->name=str_repeat('--|', $dlen).$value->name;
        }

        return $list;
    }
    // 加载列表页
    public function index()
    {
        $cate = self::getCate();
        // dd($cate);
        //加载模板页面
        return view('Admin.Cates.index', ['cate' => $cate, 'request' => $this->request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // 调整类别顺序
    public static function getCates(){
        // 原始的方法 
        $list = DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach($list as $key=>$value){
            //把字符串转换为数组
            $arr = explode(',', $value->path);
            // var_dump($arr);
            //获取数组的长度
            $len = count($arr);
            // var_dump($len);
            //获取逗号的个数
            $dlen = $len-1;
            // str_repeat 重复字符串
            $list[$key]->name = str_repeat('--|', $dlen).$value->name;
        }

        return $list;
    }

    // 类别添加
    public function create()
    {
        //获取类别信息
        // $list=DB::table('cates')->get();
        $list = self::getCates();
        //加载添加模板
        return view('Admin.Cates.add', ['list' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加
    public function store(Request $request)
    {
        //获取参数信息
        // dd($request->all());
        $data=array();
        $data=$request->except('_token');
        //获取pid
        $pid=$request->input('pid');
        //如果添加的是顶级分类
        if($pid==0){
            //拼接path
            $data['path']='0';
            // dd($data);
        }else{
            //如果添加的不是顶级分类
            // dd($data);
            //获取父类的信息
            $info = DB::table('cates')->where('id', '=', $pid)->first();
            // dd($info);
            //拼接path
            $data['path'] = $info->path.','.$info->id;
        }

        // dd($data);
        //执行数据库的插入操作
        $res = DB::table('cates')->insert($data);
        if($res){
            return redirect('/admincates')->with('success','添加成功');

        }else{
            return back()->with('error','添加失败');
        }
    }
    public $request;
    //定义构造方法
    public function __construct(Request $request){
        //初始化成员属性
        $this->request=$request;
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
    // 修改
    public function edit($id)
    {
        //获取需要修改的数据
        $info=DB::table('cates')->where('id','=',$id)->first();
        //加载模板
        return view('Admin.Cates.edit', ['info' => $info, 'cates' => self::getCates()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request, $id)
    {
        //获取参数信息
        // dd($request->all());
        $data = array();
        $data = $request->except('_method', '_token');
        //获取pid
        $pid = $request->input('pid');
        //如果修改的是顶级分类
        if($pid == 0){
            //拼接path
            $data['path'] = '0';
            // dd($data);
        }else{
            //如果修改的不是顶级分类
            // dd($data);
            //获取父类的信息
            $info = DB::table('cates')->where('id', '=', $pid)->first();
            // dd($info);
            //拼接path
            $data['path'] = $info->path.','.$info->id;
        }

        // dd($data);
        //执行数据库的修改操作
        $res = DB::table('cates')->where('id', '=', $request->input('id'))->update($data);
        if($res){
            return redirect('/admincates')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除
    public function destroy($id)
    {
        // echo $id;
        //判断当前类别有没有子类 如果有 先去删除子类 如果没有 直接删除当前类别
        $res = DB::table('cates')->where('pid','=',$id)->count();
        if($res>0){
            //有子类
            return back()->with('error','请先删除子类信息');
        }

        //没有子类信息
        if(DB::table('cates')->where('id', '=', $id)->delete()){
            return redirect('/admincates')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}