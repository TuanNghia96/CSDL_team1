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
    
    public static $statusUrl = [
        self::EXIST_STATUS => 'https://cdn1.iconfinder.com/data/icons/shipping-delivery-4/24/Shipping_delivery_box_check-512.png',
        self::ORDER_STATUS => 'https://cdn1.iconfinder.com/data/icons/shipping-delivery-4/24/Shipping_delivery_box_check-512.png',
        self::DELIVERY_STATUS => 'https://cdn1.iconfinder.com/data/icons/shipping-delivery-4/24/Shipping_delivery_free_truck-512.png',
        self::DELIVERED_STATUS => 'https://cdn1.iconfinder.com/data/icons/shipping-delivery-4/24/Shipping_delivery_box_hand_hold_care-256.png',
        self::CANCEL_STATUS => 'https://cdn1.iconfinder.com/data/icons/shipping-delivery-4/24/Shipping_delivery_box_cancel_disable-512.png'
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
