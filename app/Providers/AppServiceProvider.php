<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Models\Cart;
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
            if(Session("cart")){
            $oldCart=Session::get("cart");
            $cart= new Cart($oldCart);
            $view->with(['cart'=>Session::get("cart"),"product_cart"=>$cart->items,"totalPrice"=>$cart->total,"totalQty"=>$cart->totalQty]);
            }
        });  
    }
}
