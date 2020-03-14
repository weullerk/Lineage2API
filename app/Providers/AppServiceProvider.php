<?php

namespace App\Providers;

use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
//    public $bindings = [
//        App\Contracts\Controllers\Account\CreateAccountControllerContract::class => App\Http\Controllers\Account\CreateAccountController::class,
//        App\Contracts\Model\Account\AccountModelContract::class => App\Models\Account\AccountModel::class,
//        App\Contracts\Repositories\Account\AccountEntityContract::class => App\Repositories\L2JEloquentMariaDB\Account\AccountEntity::class,
//        App\Contracts\Repositories\Account\AccountRepositoryContract::class => App\Repositories\L2JEloquentMariaDB\Account\AccountRepository::class,
//        App\Contracts\Requests\Account\CreateAccountRequestContract::class => App\Http\Requests\Account\CreateAccountRequest::class,
//        App\Contracts\Services\Account\CreateAccountServiceContract::class => App\Services\Account\CreateAccountService::class
//    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Controllers\Account\CreateAccountControllerContract', 'App\Http\Controllers\Account\CreateAccountController');
        $this->app->bind('App\Contracts\Controllers\Account\ChangeAccountPasswordControllerContract', 'App\Http\Controllers\Account\ChangeAccountPasswordController');
        $this->app->bind('App\Contracts\Controllers\Auth\AuthControllerContract', 'App\Http\Controllers\Auth\AuthController');

        $this->app->bind('App\Contracts\Model\Account\AccountModelContract', 'App\Models\Account\AccountModel');
        $this->app->bind('App\Contracts\Model\Account\ChangeAccountPasswordModelContract', 'App\Models\Account\ChangeAccountPasswordModel');

        $this->app->bind('App\Contracts\Repositories\Account\AccountEntityContract', 'App\Repositories\L2JEloquentMariaDB\Account\AccountEntity');

        $this->app->bind('App\Contracts\Repositories\Account\AccountRepositoryContract', 'App\Repositories\L2JEloquentMariaDB\Account\AccountRepository');

        $this->app->bind('App\Contracts\Requests\Account\CreateAccountRequestContract', 'App\Http\Requests\Account\CreateAccountRequest');
        $this->app->bind('App\Contracts\Requests\Account\ChangeAccountPasswordRequestContract', 'App\Http\Requests\Account\ChangeAccountPasswordRequest');
        $this->app->bind('App\Contracts\Requests\Auth\AuthRequestContract', 'App\Http\Requests\Auth\AuthRequest');

        $this->app->bind('App\Contracts\Services\Account\CreateAccountServiceContract', 'App\Services\Account\CreateAccountService');
        $this->app->bind('App\Contracts\Services\Account\ChangeAccountPasswordServiceContract', 'App\Services\Account\ChangeAccountPasswordService');
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
