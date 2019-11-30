<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'customer_id',
        'memo',
        'total',
        'status',
        'created_at'
    ];
}
