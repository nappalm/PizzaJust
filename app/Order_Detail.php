<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $fillable = [
        'order_id','pizza_id','price'
    ];
    protected $table = 'order_detail';
}
