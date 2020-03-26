<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Admin::get();
        //dd($student);
        return view('admin.index',['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
        $post['pwd']=encrypt($post['pwd']);
        //dd($post);
        $validatedData = $request->validate([
            'name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin|',
            
           
            'pwd'=>'required|numeric|between:111111,999999999999',
            'tel'=>'required',
             'email'=>'required',
        ],[
           
            'name.regex'=>'必填、长度范围为2-16位，规则是可以包含中文、数字、字母、下划线且唯一',
            'name.unique'=>'管理员名称已存在',
            
            'pwd.required'=>'密码必填',
            
            'pwd.between'=>'密码最小6位',
            'tel.required'=>'手机号必填',
            'email.required'=>'邮箱必填',
        ]);
        //文件上传
        if ($request->hasFile('simg')) {
            $post['simg']=upload('simg');
        }
         $res=Admin::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/admin/index');
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
        $admin=Admin::where('id',$id)->first();
        //dd($shoop);
        return view('admin.edit',['admin'=>$admin]);
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
                Rule::unique('admin')->ignore($id),
            ],
            
           
            'pwd'=>'required|numeric|between:111111,999999999999',
            'tel'=>'required',
             'email'=>'required',
        ],[
           
            'name.regex'=>'必填、长度范围为2-16位，规则是可以包含中文、数字、字母、下划线且唯一',
            'name.unique'=>'管理员名称已存在',
            
            'pwd.required'=>'密码必填',
            
            'pwd.between'=>'密码最小6位',
            'tel.required'=>'手机号必填',
            'email.required'=>'邮箱必填',
        ]);
         $post=$request->except('_token');
       
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        if ($request->hasFile('simg')) {
            $post['simg']=upload('simg');
            //dd($img);
        }
        //ORM
        
        $res=Admin::where('id',$id)->update($post);
        if ($res!==false) {
            return redirect('/admin/index');
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
        $res=Admin::destroy($id);
        if ($res) {
            return redirect('/admin/index');
        }
    }
    public function checkOnly(){
        $name=request()->name;
        $count=Admin::where('name',$name)->count();
        //echo $name;
        return json_encode(['code'=>'00000','count'=>"$count"]);
    }
}
