<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $name=request()->name;
        $where=[];
        $where[]=['name','like',"%$name%"];
        $book=Book::where($where)->paginate($pageSize);
        $query=request()->all();
        return view('book.index',['book'=>$book,'query'=>$query]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
         $validatedData = $request->validate([
            'name' => 'required|between:2,15|unique:book|alpha_num',
            'man' => 'required',
           
            
        ],[
            'name.required'=>'书名必填',
           
            'name.unique'=>'书名已存在',
            'name.between'=>'书名长度2-50',
            'name.alpha_num'=>'输入不合法',
            
            'man.required'=>'作者必填',
            
        ]);  
         //dd($post);
         //文件上传
        if ($request->hasFile('simg')) {
            $post['simg']=$this->upload('simg');
        }
        $res=Book::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/book/index');
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
