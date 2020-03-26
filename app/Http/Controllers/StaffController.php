<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $xname=request()->xname;
        $where=[];
        if ($xname) {
            $where[]=['xname','like',"%$xname%"];
        }
        $staff=Staff::where($where)->paginate($pageSize);
        //dd($staff);
        $query=request()->all();
        return view('staff.index',['staff'=>$staff,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
        //文件上传
        if ($request->hasFile('f_img')) {
            $post['f_img']=upload('f_img');
            //dd($img);
        }
        //多文件上传
        if ($request->hasFile('f_imgs')) {
            $f_imgs=Moreupload('f_imgs');
            //dd($img);
            $post['f_imgs']=implode('|', $f_imgs);
        }
        $res=Staff::insert($post);
        //dd($res);
        if ($res) {
            return redirect('/staff/index');
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
