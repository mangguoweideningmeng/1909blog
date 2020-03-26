<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\News;
class NewsController extends Controller
{
    public function index(){
        //Redis::flushall();
    	// $pageSize=config('app.pageSize');
        $page=request()->page??1;
        //echo $page;
        $name=request()->name??"";
        $new=Redis::get('newlist_'.$page.'_'.$name);
        //dump('newlist_'.$page.'_'.$name);
        if (!$new) {
           //dd($name);
            //echo 'db';
            $where=[];
            if ($name) {
                $where[]=["name","like","%$name%"];
            }
            $new=News::where($where)->paginate(2);
            //dd($new);
            //$query=request()->all();
            //dd($query);
            $new=serialize($new);
            Redis::setex('newlist_'.$page.'_'.$name,5*60,$new);
        }
        $new=unserialize($new);
    	return  view('news.index',['new'=>$new,'name'=>$name]);
    }
}
