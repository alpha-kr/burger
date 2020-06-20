<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use App\categoria;

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
        View::composer(['burger.index','home','burger.cart','burger.userdata'], function ($view) {

            $categorias=categoria::all();
            $view->with('categorias',$categorias)
                    ->with('item',Cart::content()->count());
        });
    }
}
