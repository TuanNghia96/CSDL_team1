<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image_font',
        'image_back',
        'image_up',
        'sex',
        'price',
        'category_id',
        'high',
        'status',
        'created_at'
    ];
}
