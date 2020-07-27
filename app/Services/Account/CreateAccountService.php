<?php

namespace App\Services\Account;

use App\Contracts\Models\Account\AccountModelContract;
use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\CreateAccountServiceContract;
use App\Exceptions\FailureException;
use App\Traits\L2J\L2jPasswordEncryter;

class CreateAccountService implements CreateAccountServiceContract
{
    use L2jPasswordEncryter;

    private $accountRepository = null;

    public function __construct(AccountRepositoryContract $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create(AccountModelContract $accountModel): AccountModelContract
    {
        if ($accountModel->getPassword() != $accountModel->getConfirmPassword()) {
            throw new FailureException("A confirmação de senha falhou.");
        }
        $accountModel->setPassword($this->l2jPasswordEncrypt($accountModel->getPassword()));
        return $this->accountRepository->create($accountModel);
    }
}
