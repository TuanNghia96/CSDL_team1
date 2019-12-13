<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    
    public function getData($input)
    {
        $builder = $this->orderBy('created_at');
        if (isset($input['user_id'])) {
            $builder->where('user_id', '=', $input['user_id']);
        }
        if (isset($input['product_id'])) {
            $builder->where('product_id', '=', $input['product_id']);
        }
        if (isset($input['email'])) {
            $builder->where('email', 'LIKE', '%' . $input['email'] . '%');
        }
        if (isset($input['phone'])) {
            $builder->where('phone', '=', $input['phone']);
        }
        if (isset($input['address'])) {
            $builder->where('address', 'LIKE', '%' . $input['address'] . '%');
        }
        if (isset($input['role'])) {
            $builder->where('role', '=', $input['role']);
        }
    }
    
    /**
     * relationship to product
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
    
    /**
     * relationship to user
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    static public function get_review($id){
        $result=DB::table('feedbacks')->join('users','users.id',"=","feedbacks.user_id")->where("product_id","=","$id")->get();
        return $result;
    }
}
