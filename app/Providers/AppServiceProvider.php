<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Customers;
use Auth;
use DB;
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
     Schema::defaultStringLength(191);
     view()->composer('welcome',function ($view)
     {
        $categories = Category::where(['parent_id' => 0])->get();
        $view->with('categories',$categories);
     });  
        view()->composer('welcome',function ($view)
     {
        if ( Auth::guard('customers')->check()) {
            $customer_email=Auth::guard('customers')->user()->email;
            $cart=DB::table('cart')->where('customer_email',$customer_email)->count();
            $view->with('cart',$cart);
        }
        else
        { 
            $cart='0';
            $view->with('cart',$cart);
        }
        
     }); 
    }
}
