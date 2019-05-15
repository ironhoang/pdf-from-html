<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* NEW BINDING */

        $this->app->singleton(
            \App\Helpers\StringHelperInterface::class,
            \App\Helpers\Production\StringHelper::class
        );
        $this->app->singleton(
            \App\PipeLine\DataPipeLineInterface::class,
            \App\PipeLine\Action\DataPipeLine::class
        );
    }
}
