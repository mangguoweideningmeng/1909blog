<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\StoreBrandPost;
use DB;
use Validator;

use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //存储session
        //session(['name'=>'zhangsan']);
        //取
        //echo session('name');
        //销毁
        //session(['name'=>null]);
        //存
        //request()->session()->put('number',100);
        //取
        //echo request()->session()->get('number');
        //销毁
        //request()->session()->forget('number');
        //获取所有cookie
        //dump(request()->session()->all());
        //删除所有
        //request()->session()->flush();
        //###@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //request()->session()->save();
         $pageSize=config('app.pageSize');
        //$brand=Db::table('brand')->select('brand_name','brand_desc')->get();
        //$brand=Db::table('brand')->value('brand_name');
        //$brand=Db::table('brand')->get();
        //ORM
        //$brand=Brand::all();
        $brand=Brand::orderby('brand_id','desc')->paginate($pageSize);
        //dd($brand);
        return view('brand.index',['brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *添加界面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    //第二种
    //public function store(StoreBrandPost $request)
    //{
        //echo 122;
        //第一种验证
        // $validatedData = $request->validate([
        //     'brand_name' => 'required|unique:brand|max:255',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填',
        //     'brand_name.unique'=>'品牌名称已存在',
        //     'brand_name.max'=>'品牌名称长度最大255',
        //     'brand_url.required'=>'品牌网址必填',
            
        // ]);
        $post=$request->except('_token');
        //dd($post);
        $validator = Validator::make($post,[
            'brand_name' => 'required|unique:brand|max:255',
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.max'=>'品牌名称长度最大255',
            'brand_url.required'=>'品牌网址必填',
            
     ]);
    
        if ($validator->fails()) {
            return redirect('brand/create')
            ->withErrors($validator)
            ->withInput();
        }
        //$res=DB::table('brand')->insert($post);
        //dd($res);
        //文件上传
        if ($request->hasFile('brand_logo')) {
            $post['brand_logo']=$this->upload('brand_logo');
            //dd($img);
        }
        //ORM
        //第一种
        // $brand=new Brand;
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_url=$request->brand_url;
        // $brand->brand_logo=$request->brand_logo;
        // $brand->brand_desc=$request->brand_desc;
        // $res=$brand->save();
        //第二种
        // $res=Brand::insert($post);
        //第三种
        $res=Brand::create($post);
        if ($res) {
            return redirect('/brand/index');
        }
    }
    //文件上传
    public function upload($img){
        if (request()->file($img)->isValid()) {
            //接受文件
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未找到文件或上传过程出错');
    }
    /**
     * Display the specified resource.
     *详情页展示(预览)
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *展示编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$brand=DB::table('brand')->where('brand_id',$id)->first();
        //ORM
        //第一种
        //$brand=Brand::find($id);
        //第二种
        $brand=Brand::where('brand_id',$id)->first();
        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=$request->except('_token');
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        if ($request->hasFile('brand_logo')) {
            $post['brand_logo']=$this->upload('brand_logo');
            //dd($img);
        }
        //ORM
        
        $res=Brand::where('brand_id',$id)->update($post);
        if ($res!==false) {
            return redirect('/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$res=DB::table('brand')->where('brand_id',$id)->delete();
        $res=Brand::destroy($id);
        if ($res) {
            return redirect('/brand/index');
        }
    }
    public function checkOnly(){
        $name=request()->name;
        $count=Brand::where('brand_name',$name)->count();
        //echo $name;
        return json_encode(['code'=>'00000','count'=>"$count"]);
    }
}
