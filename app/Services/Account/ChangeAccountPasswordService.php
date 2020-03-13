<?php


namespace App\Services\Account;

use App\Contracts\Model\Account\AccountModelContract;
use App\Contracts\Model\Account\ChangeAccountPasswordModelContract;
use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\ChangeAccountPasswordServiceContract;
use App\Exceptions\FailureException;
use App\Traits\L2J\L2jPasswordEncryter;


class ChangeAccountPasswordService implements ChangeAccountPasswordServiceContract
{
    use L2jPasswordEncryter;

    private $accountRepository = null;

    public function __construct(AccountRepositoryContract $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function changePassword(AccountModelContract $accountModel, ChangeAccountPasswordModelContract $changePasswordModel): bool
    {
        if ($changePasswordModel->getNewPassword() != $changePasswordModel->getConfirmPassword())
            throw new FailureException("A confirmação de senha falhou.");

        $oldPassword = bcrypt($this->l2jPasswordEncrypt($changePasswordModel->getOldPassword()));
        if ($accountModel->getPassword != $oldPassword)
            throw new FailureException("A senha atual não está correta.");

        $accountModel->setPassword($this->l2jPasswordEncrypt($changePasswordModel->getOldPassword()));

        return $this->accountRepository->changePassword($accountModel);
    }
}
