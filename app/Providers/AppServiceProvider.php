<?php

namespace App\Providers;

use App\Items;
use App\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\VarDumper\Cloner\Data;

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
        View::share('posts',Post::where([['order_left','!=',0.00],['ended_at','>',Carbon::now("GMT+6")]])->latest()->paginate(6));
        View::share('foodPosts',Post::where([['order_left','!=',0.00],['ended_at','>',Carbon::now("GMT+6")]])->latest()->get());
        View::share('itemNames',Items::all());
        //View::share('dateTime',Carbon::now()->toDateTimeString());
        View::share('dateTime',Carbon::now("GMT+6"));
    }
}
