<?php


namespace App\Services\Account;


use App\Contracts\Models\Account\ResetPasswordModelContract;
use App\Contracts\Services\Account\ResetPasswordServiceContract;
use App\Exceptions\FailureException;
use App\Traits\L2J\L2jPasswordEncryter;
use Carbon\Carbon;


class ResetPasswordService implements ResetPasswordServiceContract
{
    use L2jPasswordEncryter;

    public function reset(string $token, ResetPasswordModelContract $resetPasswordModel): bool
    {
        $passwordRecoveryRepository = app('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryRepositoryContract');
        $passwordRecoveryModel = $passwordRecoveryRepository->getByToken($token);

        $accountRepository = app('App\Contracts\Repositories\Account\AccountRepositoryContract');
        $accountModel = $accountRepository->getByLogin($passwordRecoveryModel->getLogin());

        if ($resetPasswordModel->getNewPassword() != $resetPasswordModel->getConfirmPassword())
            throw new FailureException("A confirmação de senha falhou.");

        if ($resetPasswordModel->getEmail()  != $accountModel->getEmail()) {
            throw new FailureException("A confirmação de email falhou! O email não confere!");
        }

        if ($passwordRecoveryModel->getActive() == false) {
            throw new FailureException("O token informado já foi utilizado!");
        }

        $expirationTimeTimestamp = Carbon::createFromDate($passwordRecoveryModel->getExpirationTime());

        $actualTimestamp = Carbon::now();
        if ($actualTimestamp->isAfter($expirationTimeTimestamp)) {
            throw new FailureException("O token expirou! Tente novamente.");
        }

        $accountModel->setPassword($this->l2jPasswordEncrypt($resetPasswordModel->getNewPassword()));
        if ($accountRepository->changePassword($accountModel)) {
            $passwordRecoveryRepository->deactivate($passwordRecoveryModel->getId());
            return true;
        }

        return false;
    }
}
