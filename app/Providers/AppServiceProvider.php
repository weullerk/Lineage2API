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

        $this->app->bind('App\Contracts\Model\Account\AccountModelContract', 'App\Models\Account\Account');
        $this->app->bind('App\Contracts\Services\CreateAccountServiceContract', 'App\Services\Account\CreateAccountService');
        $this->app->bind('App\Contracts\Repositories\Entity\AccountEntity', 'App\Repositories\Eloquent\Entity\Account');
        $this->app->bind('App\Contracts\Repositories\AccountRepository', 'App\Repositories\Eloquent\AccountRepository');
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
