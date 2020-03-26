<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
     protected $table = 'order_address';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=[];
}
