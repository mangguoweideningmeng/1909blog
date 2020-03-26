<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Category;
use App\Shoop;
use DB;
class IndexController extends Controller
{
    public function index(){
       // Redis::flushall();
        $cate=Cache::get('pid');
        //dd($cate);
        //dump($cate);
        if (!$cate) {
            //.echo "哈哈哈";
            $cate=Category::where('pid',0)->get();
             Cache::put('pid',$cate,60*60*24);
        }
    	 $shoop=Cache::get('shoop');
         //dd($shoop);
         //var_dump($shoop);
         if (!$shoop) {
           // echo "db";
            $shoop=DB::table('shoop')
            
            -> orderBy('id','desc')
            -> take(5)
            -> get();
              Cache::put('shoop',$shoop,60*60*24);
         }
    	
    	$shoopc=DB::table('shoop')
    		->where('cu',1)
    		-> orderBy('id','desc')
   			-> take(3)
    		-> get();

        //$h=Cache::get('huan');
        $h=Redis::get('huan');
            //dd($h);
        //dump($h);
        if (!$h) {
            //echo "DB.....";
          $h=Shoop::getSlideData();
           //Cache::put('huan',$h,60*60*24);
          $h=serialize($h);
          Redis::setex('huan',60*60*24,$h); 
        }
       $h=unserialize($h);
    	
        $z=Shoop::count();
        //dd($z);
    	//dd($shoopc);
    	return view('index.index',['cate'=>$cate,'shoop'=>$shoop,'shoopc'=>$shoopc,'h'=>$h,'z'=>$z]);
    }
   
}
