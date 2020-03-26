<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shoop;
class ListController extends Controller
{
    public function lb(){
    	$goods=Shoop::all();
    	return view('index.prolist',['goods'=>$goods]);
    }
}
