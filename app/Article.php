<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'Article';
     protected $guarded=[];
     public $timestamps = false;
}
