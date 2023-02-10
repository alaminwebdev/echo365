<?php

namespace App\Providers;

use App\Models\SidebarAd;
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

        $sidebar_top_ad = SidebarAd::where('sidebar_ad_loaction','top')->get();
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);

        $sidebar_down_ad = SidebarAd::where('sidebar_ad_loaction','down')->get();
        view()->share('global_sidebar_down_ad', $sidebar_down_ad);
    }
}
