<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$type=Type::get();
        //dd($type);
        //$type=DB::table('type')->get();
        $type=Type::get();
        //dd($type);
        return view('/type/index',['type'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
        $res=Type::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/type/index');
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
        $type=Type::find($id);
        return view('type.edit',['type'=>$type]);
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
        $res=Type::where('id',$id)->update($post);
        if ($res!==false) {
            return redirect('/type/index');
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
        $res=Type::destroy($id);
        if ($res) {
            return redirect('/type/index');
        }
    }
    public function checkOnly(){
        $name=request()->name;
        $count=Type::where('name',$name)->count();
        //echo $name;
        return json_encode(['code'=>'00000','count'=>"$count"]);
    }
}
