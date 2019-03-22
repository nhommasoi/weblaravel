<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer(['header','page\dathang'],function($view){
        
        $loai_sp=ProductType::all();
        
        $view->with('loai_sp',$loai_sp);
       });
       // view()->composer(['header',page_dat-],function($view){
       //  $product_cart=ProductType::all();
       //  $view->with('product_cart',$product_cart);
       // });


       view()->composer(['header','page\dathang'],function($view){
         if(Session('cart')){
             $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,
            'totalPrice'=>$cart->totalPrice,'totalQly'=>$cart->totalQty]);
        }
       });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
    {
        $this -> app -> bind('path.public', function()
        {
        return base_path('public');
        });
    }
}
