<?php

namespace App\Providers;

use App\Models\TopAd;
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
        $top_ad_data = TopAd::findOrFail(1);
        view()->share('global_top_ad', $top_ad_data);
    }
}
