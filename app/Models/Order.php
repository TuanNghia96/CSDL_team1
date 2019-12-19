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
    
    const EXIST_STATUS = 0;
    const ORDER_STATUS = 1;
    const DELIVERY_STATUS = 2;
    const DELIVERED_STATUS = 3;
    const CANCEL_STATUS = 4;
    
    public static $status = [
        self::EXIST_STATUS => 'Chưa đặt hàng',
        self::ORDER_STATUS => 'Đặt hàng',
        self::DELIVERY_STATUS => 'Giao hàng',
        self::DELIVERED_STATUS => 'Đã giao',
        self::CANCEL_STATUS => 'Hủy đơn'
    ];
    
    /**
     * get list data
     *
     * @param $request
     * @return
     */
    public function getList($request)
    {
        $input = $request->all();
        $builder = $this->orderBy('created_at');
        if (isset($input['status'])) {
            $builder->where('status', '=', $input['status']);
        }
        return $builder->paginate();
    }
    
    /**
     * relationship to ordersDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordersDetail()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }
    
    /**
     * relationship to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
