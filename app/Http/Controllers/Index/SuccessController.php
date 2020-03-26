<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use DB;
class SuccessController extends Controller
{
    public function success(){
    	// $order_idd=input('order_idd');
    	// dd($order_idd);
    	$orderInfo=Order::get();
    	
    	//dd($admin);
    	return view('index.success',['orderInfo'=>$orderInfo]);
    }
}
