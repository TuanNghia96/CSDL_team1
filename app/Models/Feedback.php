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
    
    /**
     * get data
     *
     * @param array $input
     * @return Feedback
     */
    public function getData($input)
    {
        $builder = $this->orderBy('created_at');
        if (isset($input['user_id'])) {
            $builder->where('user_id', $input['user_id']);
        }
        if (isset($input['product_id'])) {
            $builder->where('product_id', $input['product_id']);
        }
        return $builder->paginate();
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
    static public function set_review($user_id,$id_product,$txt){
        $result=DB::table('feedbacks')->insert(["user_id"=>$user_id,"product_id"=>$id_product,"content"=>"$txt","created_at"=>date('Y-m-d H:i:s')]);
        return $result;
    }
}
