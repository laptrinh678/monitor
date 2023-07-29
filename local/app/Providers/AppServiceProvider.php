<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()

    {
         $data['service'] = service::all();
         view()->share($data);
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
