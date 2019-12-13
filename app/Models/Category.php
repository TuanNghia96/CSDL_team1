<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Category extends Model
{
    protected $table = 'categorys';
    public $timestamps = false;
    protected $fillable = [
        'name' ,
        'status' ,
        'created_at'
    ];
    
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
    static public function get_name(){
        $result=DB::table('categorys')->orderByRaw('created_at DESC')->offset(0)->limit(15)->get();
        return $result;
    }
}
