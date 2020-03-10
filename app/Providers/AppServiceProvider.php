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
        //CreateAccountServiceContractAccountService

        $this->app->bind('App\Contracts\Model\Account\Account', 'App\Models\Account\Account');
        $this->app->bind('App\Contracts\Services\CreateAccountServiceContract', 'App\Services\Account\CreateAccountService');
        $this->app->bind('App\Contracts\Repositories\Entity\Account', 'App\Repositories\Eloquent\Entity\Account');
        $this->app->bind('App\Contracts\Repositories\Account', 'App\Repositories\Eloquent\Account');
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
