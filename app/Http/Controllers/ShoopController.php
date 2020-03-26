<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoop;
use App\Brand;
use App\Category;
use Illuminate\Validation\Rule;
class ShoopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name;
        $where=[];
        if ($name) {
            $where[]=['name','like',"%$name%"];
        }
        $pageSize=config('app.pageSize');
        $shoop=Shoop::leftjoin('category','shoop.cate_id','=','category.cate_id')
            ->leftjoin('brand','shoop.brand_id','=','brand.brand_id')
            ->where($where)
            ->paginate($pageSize);
            
        return view('shoop.index',['shoop'=>$shoop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::all();
        $cate=Category::all();
        $cate=CreateTree($cate);
        //dd($cate);
        return view('shoop.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post=$request->except('_token');
        //dd($post);
        //验证
        $validatedData = $request->validate([
            'name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:shoop|',
            'art' => 'required',
           
            'num'=>'required|numeric|between:1,9999999',
            'price'=>'required|numeric',
            
        ],[
           
            'name.regex'=>'必填、长度范围为2-50位，规则是可以包含中文、数字、字母、下划线且唯一',
            'name.unique'=>'商品名称已存在',
            
            'num.required'=>'商品库存必填',
            'num.numeric'=>'商品库存必须是数字',
            'num.between'=>'商品库存最大8位',
            'price.required'=>'商品价格必填',
            'price.numeric'=>'商品价格必须是数字',
        ]);
        //文件上传
        if ($request->hasFile('simg')) {
            $post['simg']=$this->upload('simg');
        }
        //多文件上传
        if ($request->hasFile('simgs')) {
            $simgs=$this->Moreupload('simgs');
            //dd($img);
            $post['simgs']=implode('|', $simgs);
        }
        $res=Shoop::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/shoop/index');
        }
    }
    public function upload($img){

        $file=request()->$img;
        if ($file->isValid()){
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未找到文件或上传过程出错');
    }
    //多文件上传
    public function Moreupload($img){
        //接受文件
        $file=request()->$img;
        //dd($file);
        foreach ($file as $k => $v) {
            if ($v->isValid()) {
               $store_result[$k]=$v->store('uploads');
            
            }else{
                $store_result[$k]="未找到文件或上传过程出错";
            }
        }
        
        return $store_result;
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
        $brand=Brand::all();
        $cate=Category::all();
        $cate=CreateTree($cate);
        $shoop=Shoop::where('id',$id)->first();
        //dd($shoop);
        return view('shoop.edit',['shoop'=>$shoop,'brand'=>$brand,'cate'=>$cate]);
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
        $validatedData = $request->validate([
            'name' => [
                'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                Rule::unique('shoop')->ignore($id),
            ],
            'art' => 'required',
           
            'num'=>'required|numeric|between:1,9999999',
            'price'=>'required|numeric',
            
        ],[
           
            'name.regex'=>'必填、长度范围为2-50位，规则是可以包含中文、数字、字母、下划线且唯一',
            'name.unique'=>'商品名称已存在',
            
            'num.required'=>'商品库存必填',
            'num.numeric'=>'商品库存必须是数字',
            'num.between'=>'商品库存最大8位',
            'price.required'=>'商品价格必填',
            'price.numeric'=>'商品价格必须是数字',
        ]);
        $post=$request->except('_token');
       
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        if ($request->hasFile('simg')) {
            $post['simg']=$this->upload('simg');
            //dd($img);
        }
        //ORM
        
        $res=Shoop::where('id',$id)->update($post);
        if ($res!==false) {
            return redirect('/shoop/index');
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
        $res=Shoop::destroy($id);
        if ($res) {
            return redirect('/shoop/index');
        }
    }
    public function checkOnly(){
        $name=request()->name;
        $count=Shoop::where('name',$name)->count();
        //echo $name;
        return json_encode(['code'=>'00000','count'=>"$count"]);
    }
}
