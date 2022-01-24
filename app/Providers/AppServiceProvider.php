<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\ServiceProvider;


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
        $v = new Verta();
        $dateNow = $v->format('Y/m/d');
        View::share('dateNow',$dateNow);
    }
}
