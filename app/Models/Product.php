<?php

namespace App\Models;

use Carbon\Carbon;
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
        'created_at',
        'size'
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
    /**
     * relationship to feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    
    /**
     * relationship to orderdetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
    
    public function listData($input)
    {
        
        $builder = $this->orderBy('created_at');
        if (isset($input['name'])) {
            $builder->where('name', 'LIKE', '%' . $input['name'] . '%');
        }

        if (isset($input['status'])) {
            $builder->where('status', '=', $input['status']);
        }
        if (isset($input['category_id'])) {
            $builder->where('category_id', '=', $input['category_id']);
        }
        if (isset($input['from'])) {
            $builder->where('created_at', '>=', $input['from']);
        }
        if (isset($input['to']) ) {
            $builder->where('created_at', '<', $input['to']);
        }
        return $builder->paginate();
    }
    /**
     * store product data
     *
     * @param $request
     * @return mixed
     */
    public function storeData($request)
    {
        $input = $request->all();
    
        $filePart = 'upload/product';
        if ($request->hasFile('image_font')) {
        
            $file = $request->image_font;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_font'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_back')) {
        
            $file = $request->image_back;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_back'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_up')) {
        
            $file = $request->image_up;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_up'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        $input['size'] = ($input['size'] / 10);
        $input['created_at'] = Carbon::now();
        return $this->create($input);
    }
    
    public function updateData($request)
    {
        $input = $request->all();
    
        $filePart = 'upload/product';
        if ($request->hasFile('image_font')) {
    
            $file = $request->image_font;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_font'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_back')) {
        
            $file = $request->image_back;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_back'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_up')) {
        
            $file = $request->image_up;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_up'] = '../' . $filePart . '/' . $file->getClientOriginalName();
        }
        $input['size'] = ($input['size'] / 10);
        $input['created_at'] = Carbon::now();
        return $this->find($input['id'])->update($input);
    
    }
}
