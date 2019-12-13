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
    static public function New_Product($sl){
        $result=DB::table('products')->orderByRaw('created_at DESC')->paginate($sl);
        return $result;
    }
    static public function Best_Product(){
        $result=DB::table('products')->join('order_details',"order_details.id","=","products.id")->orderByRaw('quantity DESC')->offset(0)->limit(4)->get();
        return $result;
    }
    static public function Product_lq($id,$id_category){
        $result=DB::table('products')->join("categorys","categorys.id","=","products.category_id")->where([["products.id","!=","$id"],["products.category_id","=","$id_category"]])->orderByRaw('products.created_at DESC')->offset(0)->limit(3)->get();
        return $result;
    }
    static public function category_product($id_category){
        $result=DB::table('products')->where("category_id","=","$id_category")->orderByRaw('products.created_at DESC')->paginate(3);
        return $result;
    }
    static public function Best_category_product($category_id){
      $result=DB::table('products')->join('order_details',"order_details.product_id","=","products.id")->where("products.category_id","=","$category_id")->orderByRaw('order_details.quantity DESC')->paginate(3);
      return $result;
    }
}
