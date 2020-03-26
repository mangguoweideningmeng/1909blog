<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Shoop;
class ProinfoController extends Controller
{
    public function proinfo($id){
    	//dd($id);
    	 //$h=Cache::get('huan');
    	// if($count=Cache::add('count_'.$id,1)){
    	// 	$count=Cache::get('count_'.$id);
    	// }else{
    	// 	$count=Cache::increment('count_'.$id);
    	// }
    	// $count=Cache::add('count_'.$id,1)?Cache::get('count_'.$id):Cache::increment('count_'.$id);
        $count=Redis::setnx('count_'.$id,1)?Redis::get('count_'.$id):Redis::incr('count_'.$id);
    	$goodsinfo=Shoop::where('id',$id)->first();
    	//dd($goodsinfo);
    	//$h=Shoop::where('huan',1)->get();
    	return view('index.proinfo',['goodsinfo'=>$goodsinfo,'count'=>$count]);
    }
}
