<?php

namespace App\Providers;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        //Option 1 - Every single view
 //       view()->share('channels', Channel::orderby('name')->get());

        //Option 2 - Granular views with wildcard
//        view()->composer(['post.*','channel.index'], function($view)
//        {
//            $view->with('channels', Channel::orderby('name')->get());
//        });


        //Option 3 - Dedicated Class

        view()->composer('partials.channels.*', ChannelsComposer::class);

    }
}
