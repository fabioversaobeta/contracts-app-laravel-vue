<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Repositories\Property\PropertyRepositoryInterface',
            'App\Repositories\Property\PropertyRepository'
        );

        $this->app->bind(
            'App\Repositories\Contractor\ContractorRepositoryInterface',
            'App\Repositories\Contractor\ContractorRepository'
        );

        $this->app->bind(
            'App\Repositories\Contract\ContractRepositoryInterface',
            'App\Repositories\Contract\ContractRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
