<?php

namespace Webkul\SocialShare\Providers;

use Illuminate\Support\ServiceProvider;

class SocialShareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'social_share');

        $this->app->register(EventServiceProvider::class);
    }
}
