<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
     protected $table = 'order_goods';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=[];
}
