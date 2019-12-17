<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceAudit extends Model
{
    protected $table = 'product_price_audit';
    public $timestamps = false;
    
    /**
     * relation to product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
