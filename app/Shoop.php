<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoop extends Model
{
    protected $table = 'shoop';
    public $timestamps = false;
    public static function getSlideData(){
    	 $h=Shoop::where('huan',1)->get();
          
          return $h;
    }
}
