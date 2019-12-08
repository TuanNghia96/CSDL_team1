<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    
    const SLIDE = [
        'url1'=>"banner1.jpg",
        'url2'=>"banner2.jpg",
        'url3'=>"banner3.jpg",
        'url4'=>"banner4.jpg"
    ];
    static public function New_Product(){
        $result=DB::table('products')->orderByRaw('created_at DESC')->paginate(8);
        return $result;
    }
}
