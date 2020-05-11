<?php

namespace App\Providers;

use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
//    public $bindings = [
//        App\Contracts\Controllers\Account\CreateAccountControllerContract::class => App\Http\Controllers\Account\CreateAccountController::class,
//        App\Contracts\Models\Account\AccountModelContract::class => App\Models\Account\AccountModel::class,
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
        $this->app->bind('App\Contracts\Controllers\Account\VerifyAccountControllerContract', 'App\Http\Controllers\Account\VerifyAccountController');
        $this->app->bind('App\Contracts\Controllers\Account\VerifyEmailControllerContract', 'App\Http\Controllers\Account\VerifyEmailController');
        $this->app->bind('App\Contracts\Controllers\Account\RecoveryPasswordControllerContract', 'App\Http\Controllers\Account\RecoveryPasswordController');
        $this->app->bind('App\Contracts\Controllers\Account\ResetPasswordControllerContract', 'App\Http\Controllers\Account\ResetPasswordController');
        $this->app->bind('App\Contracts\Controllers\Auth\AuthControllerContract', 'App\Http\Controllers\Auth\AuthController');

        $this->app->bind('App\Contracts\Mails\RecoveryPassword\RecoveryPasswordMailContract', 'App\Mails\RecoveryPassword\RecoveryPasswordMail');

        $this->app->bind('App\Contracts\Models\Account\AccountModelContract', 'App\Models\Account\AccountModel');
        $this->app->bind('App\Contracts\Models\Account\ChangeAccountPasswordModelContract', 'App\Models\Account\ChangeAccountPasswordModel');
        $this->app->bind('App\Contracts\Models\Account\ResetPasswordModelContract', 'App\Models\Account\ResetPasswordModel');
        $this->app->bind('App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract', 'App\Models\PasswordRecovery\PasswordRecoveryModel');

        $this->app->bind('App\Contracts\Repositories\Account\AccountEntityContract', 'App\Repositories\L2JEloquentMariaDB\Account\AccountEntity');
        $this->app->bind('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryEntityContract', 'App\Repositories\L2JEloquentMariaDB\PasswordRecovery\PasswordRecoveryEntity');

        $this->app->bind('App\Contracts\Repositories\Account\AccountRepositoryContract', 'App\Repositories\L2JEloquentMariaDB\Account\AccountRepository');
        $this->app->bind('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryRepositoryContract', 'App\Repositories\L2JEloquentMariaDB\PasswordRecovery\PasswordRecoveryRepository');

        $this->app->bind('App\Contracts\Requests\Account\CreateAccountRequestContract', 'App\Http\Requests\Account\CreateAccountRequest');
        $this->app->bind('App\Contracts\Requests\Account\ChangeAccountPasswordRequestContract', 'App\Http\Requests\Account\ChangeAccountPasswordRequest');
        $this->app->bind('App\Contracts\Requests\Account\RecoveryPasswordRequestContract', 'App\Http\Requests\Account\RecoveryPasswordRequest');
        $this->app->bind('App\Contracts\Requests\Account\ResetPasswordRequestContract', 'App\Http\Requests\Account\ResetPasswordRequest');
        $this->app->bind('App\Contracts\Requests\Auth\AuthRequestContract', 'App\Http\Requests\Auth\AuthRequest');

        $this->app->bind('App\Contracts\Services\Account\CreateAccountServiceContract', 'App\Services\Account\CreateAccountService');
        $this->app->bind('App\Contracts\Services\Account\ChangeAccountPasswordServiceContract', 'App\Services\Account\ChangeAccountPasswordService');
        $this->app->bind('App\Contracts\Services\Account\VerifyAccountServiceContract', 'App\Services\Account\VerifyAccountService');
        $this->app->bind('App\Contracts\Services\Account\VerifyEmailServiceContract', 'App\Services\Account\VerifyEmailService');
        $this->app->bind('App\Contracts\Services\Account\RecoveryPasswordServiceContract', 'App\Services\Account\RecoveryPasswordService');
        $this->app->bind('App\Contracts\Services\Account\ResetPasswordServiceContract', 'App\Services\Account\ResetPasswordService');
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
