<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	echo '我是商品首页';
    }
    public function add(){
    	//dump(request()->isMethod('get'));
    	if (request()->isMethod('get')) {
    		return view('add');
    	}
    	if (request()->isMethod('post')) {
    		//return view('add');
    		echo request()->name;
    	}
    }
    public function adddo(){
    	echo request()->name;
    	//跳转
    	//return redirect('/good');
    }
    public function show($id,$name){
    	echo $id.'='.$name;
    }
    public function new($id=null,$name=null){
    	echo $id;
    }
    public function cate($id=null,$name=null){
    	echo $id."=".$name;
    	//echo $name;
    }
}
