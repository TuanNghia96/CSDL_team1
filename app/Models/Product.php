<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $result=DB::table('products')->leftJoin("categorys","products.category_id","=","categorys.id")->where([["products.id","<>",$id],["products.category_id","=","$id_category"],])->orderByRaw('products.created_at DESC')->select("products.id","image_font","image_up","image_back","products.name","products.price")->offset(0)->limit(3)->get();
        return $result;
    }
    static public function category_product($id_category){
        $result=DB::table('products')->where("category_id","=","$id_category")->orderByRaw('products.created_at DESC')->paginate(9);
        return $result;
    }
    static public function Best_category_product($category_id){
      $result=DB::table('products')->join('order_details',"order_details.product_id","=","products.id")->where("products.category_id","=","$category_id")->orderByRaw('order_details.quantity DESC')->paginate(3);
      return $result;
    }
    static public function sreach_category($text){
        $result=DB::table("categorys")->join("products","products.category_id","=","categorys.id")->where("categorys.name","like","%$text%")->orwhere("products.name","like","%$text%")->paginate(8);
        return $result;
    }
    static public function Product_Best($sl){
        $result=DB::table('products')->orderByRaw('bought DESC')->paginate($sl);
        return $result;
    }
     static public function Counter(){
        $count = DB::table('orders')->orderByRaw('id DESC')->offset(1)->limit(2)->get();
        return $count;
    } 
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
            $input['image_font'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_back')) {
        
            $file = $request->image_back;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_back'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_up')) {
        
            $file = $request->image_up;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_up'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        $input['size'] = ($input['size'] / 10);
        $input['created_at'] = Carbon::now();
        return $this->create($input);
    }
    
    public function updateData($request)
    {
        $input = $request->all();   
        $filePart = 'upload/product';
        $price = $this->find($input['id'])->price;
    
        //update new and deleted old
        if ($request->hasFile('image_font')) {
            if(File::exists(public_path($this->find($input['id'])->image_font))){
                unlink(public_path($this->find($input['id'])->image_font));
            }
            $file = $request->image_font;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_font'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_back')) {
            if(File::exists(public_path($this->find($input['id'])->image_back))){
                unlink(public_path($this->find($input['id'])->image_back));
            }
            $file = $request->image_back;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_back'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        if ($request->hasFile('image_up')) {
            if(File::exists(public_path($this->find($input['id'])->image_up))){
                unlink(public_path($this->find($input['id'])->image_up));
            }
            $file = $request->image_up;
            $file->move($filePart, $file->getClientOriginalName());
            $input['image_up'] = '/' . $filePart . '/' . $file->getClientOriginalName();
        }
        $input['size'] = ($input['size'] / 10);
        $input['created_at'] = Carbon::now();
        $this->find($input['id'])->update($input);
        if ($input['price'] != $price){
            PriceAudit::orderBy('created_at', 'DESC')->where('price_after', $input['price'])->where('product_id', $input['id'])->first()->update(['email' => Auth::user()->email]);
        }
    }
}
