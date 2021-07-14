<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view){
            $sessionName = 'shopping_cart_id';
            $shopping_cart_id = Session::get($sessionName);
            $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
            Session::put($sessionName, $shopping_cart->id);

            $view->with('productsCount', $shopping_cart->productsCount());
        });
        Paginator::useBootstrap();
    }
}
