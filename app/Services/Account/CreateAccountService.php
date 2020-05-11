<?php

namespace App\Services\Account;

use App\Contracts\Models\Account\AccountModelContract;
use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\CreateAccountServiceContract;
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
        $accountModel->setPassword($this->l2jPasswordEncrypt($accountModel->getPassword()));
        return $this->accountRepository->create($accountModel);
    }
}
