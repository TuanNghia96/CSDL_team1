<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    public $timestamps = false;
    protected $fillable = [
        'name' ,
        'status' ,
        'created_at'
    ];
}
