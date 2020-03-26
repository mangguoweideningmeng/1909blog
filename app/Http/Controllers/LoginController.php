<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function logindo(){
    	$post=request()->except('_token');
    	
    	//dd($post);
    	//$post['pwd']=md5(md5($post['pwd']));
    	//dd($post);
    	$adminuser=Admin::where('name',$post['name'])->first();
    	//dd($adminuser);
    	if(!$adminuser){
    		return redirect('/login')->with('msg','用户名或密码错误');
    	}

    	if(decrypt($adminuser->pwd)!=$post['pwd']){
    		return redirect('/login')->with('msg','用户名或密码错误');
    	}
        if (isset($post['rember'])) {
            Cookie::queue('adminuser',$adminuser,7*24*60);
        }
    	session(['adminuser'=>$adminuser]);
    	return redirect('/brand/index');
    
    	
    }
  
}
