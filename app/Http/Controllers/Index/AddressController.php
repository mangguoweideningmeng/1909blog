<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
class AddressController extends Controller
{
    public function address(){
    	return view('index.address');
    } 
    public function addressadd(){

    	$post=request()->except('_token');

    	$post['user_id']=$user_id=session('user')->id;
    	//dd($post);
    	
    	$res=Address::insert($post);

    	//dd($res);
    	if ($res) {
    		return redirect('/cart/jiesuan');
    	}
    }
}
