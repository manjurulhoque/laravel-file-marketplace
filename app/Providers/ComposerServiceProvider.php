<?php

namespace App\Providers;

use App\Http\ViewComposers\AccountStatsComposer;
use App\Http\ViewComposers\AdminStatsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('accounts.layouts.partials._stats', AccountStatsComposer::class);
        View::composer('admin.layouts.partials._stats', AdminStatsComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
