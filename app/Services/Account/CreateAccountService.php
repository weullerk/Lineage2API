<?php


namespace App\Services\Account;

use App\Contracts\Model\Account\AccountModelContract;
use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\CreateAccountServiceContract;


class CreateAccountService implements CreateAccountServiceContract
{
    private $accountRepository = null;

    public function __construct(AccountRepositoryContract $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create(AccountModelContract $accountModel): AccountModelContract
    {
        return $this->accountRepository->create($accountModel);
    }
}
