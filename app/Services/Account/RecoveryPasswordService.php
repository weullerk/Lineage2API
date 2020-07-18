<?php

namespace App\Services\Account;

use App\Contracts\Models\Account\AccountModelContract;
use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\CreateAccountServiceContract;
use App\Contracts\Services\Account\RecoveryPasswordServiceContract;
use App\Traits\L2J\L2jPasswordEncryter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class RecoveryPasswordService implements RecoveryPasswordServiceContract
{
    use L2jPasswordEncryter;

    public function __construct()
    {
    }

    public function recovery(string $email): bool
    {
        $accountRepository = app('App\Contracts\Repositories\Account\AccountRepositoryContract');
        $account = $accountRepository->getByEmail($email);

        $token = base64_encode(uniqid(true));
        $expirationTime = Carbon::now()->addHours(3);

        $passwordRecoveryModel = app('App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract');
        $passwordRecoveryModel->setLogin($account->getLogin());
        $passwordRecoveryModel->setToken($token);
        $passwordRecoveryModel->setExpirationTime($expirationTime->toDateTimeString());
        $passwordRecoveryModel->setActive(true);

        $passwordRecoveryRepository = app('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryRepositoryContract');
        $passwordRecoveryRepository->create($passwordRecoveryModel);

        $urlToResetPassword = config('config.site') . config('config.reset_password_endpoint') . $token;

        $recoveryPasswordMail = app()->makeWith(
            'App\Contracts\Mails\RecoveryPassword\RecoveryPasswordMailContract',
            ['login' => $account->getLogin(), 'url' => $urlToResetPassword]
        );

        Mail::to($account->getEmail())->send($recoveryPasswordMail);
        return true;
    }
}
