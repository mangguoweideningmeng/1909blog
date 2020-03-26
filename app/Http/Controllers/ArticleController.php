<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleType;
class ArticleController extends Controller
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
        $article=Article::leftjoin('articletype','article.a_id','=','articletype.a_id')
            ->where($where)
            ->paginate(2);
        $query=request()->all();
        return view('article.index',['article'=>$article,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article=ArticleType::all();
        //dd($article);
        return view('article.create',['article'=>$article]);
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
        //第一种验证
        $validatedData = $request->validate([
            'name' => 'required|unique:article',
            'a_id' => 'required',
        ],[
            'name.required'=>'文章名称必填',
            'name.unique'=>'文章名称已存在',
            
            'a_id.required'=>'分类必填',
            
        ]);
    
         //文件上传
        if ($request->hasFile('simg')) {
            $post['simg']=upload('simg');
            //dd($img);
        }
        //dd($post);
        $res=Article::create($post);
        if ($res) {
            return redirect('/article/index');
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
        $article=Article::where('id',$id)->first();
        $articletype=ArticleType::all();
        return view('article.edit',['article'=>$article,'articletype'=>$articletype]);
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
        $post=$request->except('_token');
         //文件上传
        if ($request->hasFile('simg')) {
            $post['simg']=upload('simg');
            //dd($img);
        }
        //dd($post);
        $res=Article::where('id',$id)->update($post);
        if (!$res==false) {
            return redirect('/article/index');
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
        $res=Article::destroy($id);
        if ($res) {
            if (request()->ajax()) {
                return json_encode(['code'=>'00000','msg'=>"删除成功"]);
            }
        }
    }
    public function checkOnly(){
        $name=request()->name;
        $count=Article::where('name',$name)->count();
        //echo $name;
        return json_encode(['code'=>'00000','count'=>"$count"]);
    }

}
