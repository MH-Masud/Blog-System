<?php

namespace App\Providers;

use App\category;
use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('forntend.pages.home',function($view){
        //     $categories = category::all();
        //     $view->with('categories',$categories);
        // });
        View::composer(['frontend.pages.home','frontend.pages.post'],function($view){
            
           $categories = category::all();
           $view->with('categories',$categories);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
