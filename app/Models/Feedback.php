<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    public $timestamps = false;
    protected $fillable = [
        'customer_id',
        'product_id',
        'content',
        'created_at'
    ];
}
