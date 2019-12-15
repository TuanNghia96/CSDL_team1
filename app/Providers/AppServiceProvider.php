<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Models\Cart;
use App\Models\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //
        view()->composer("header",function($view){
            $loai_sp=Product::all();
            $view->with("loai_sp",$loai_sp);
        });
        view()->composer(["layout.header","home.cart"],function($view){
            if(Session("id_cart")){
            $id_Cart=Session::get('id_cart');
            $cart=Cart::get_cart($id_Cart);
            $cartdetail=Cart::get_orderdetail($id_Cart);
            $product=[];
            $totalQty=0;
            $totalPrice=$cart[0]->total;
            foreach($cartdetail as $cart){
                $p=Product::find($cart->product_id);
                $totalQty+=$cart->quantity;
                array_push($product,$p);
            }
            $view->with(["cart"=>$cart,"product_cart"=>$product,"totalPrice"=>$totalPrice,"totalQty"=>$totalQty]);
            }
        });  
    }
}
