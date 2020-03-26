<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\xinwen;
use App\Newcate;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $new=xinwen::leftjoin('newcate','new.cate_id','=','newcate.cate_id')
            
            ->paginate($pageSize);
        if (request()->ajax()) {
            return view('new.ajaxpage',['new'=>$new]);
        }
        return view('new.index',['new'=>$new]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new=xinwen::all();
        $cate=Newcate::all();
        $cate=CreateTree($cate);
        return view('new.create',['cate'=>$cate,'new'=>$new]);
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
        $post['time']=time();
        //dd($post);
         $validatedData = $request->validate([
            'name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,30}$/u|unique:shoop|',
            'man' => 'required',
           
            
            
        ],[
           
            'name.regex'=>'必填、长度范围为2-30位，规则是可以包含中文、数字、字母、下划线且唯一',
            'name.unique'=>'新闻已存在',
            
            'man.required'=>'商品库存必填',

        ]);
        //dd($post);
        $res=xinwen::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/new/index');
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
}
