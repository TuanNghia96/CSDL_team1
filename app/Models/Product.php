<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'url1',
        'url2',
        'url3',
        'url4'
    ];
    
    const FEMALE_SEX = 0;
    const MALE_SEX = 1;
    public static $sex = [
        self::MALE_SEX => 'Nam',
        self::FEMALE_SEX => 'Nữ'
    ];
    
    /**
     * relation to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
