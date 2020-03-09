<?php


namespace App\Services;

use \App\Contracts\Services\Account as AccountServiceContract;
use \App\Contracts\Model\Account as AccountModelContract;
use \App\Contracts\Repositories\Repository\Account as AccountRepositoryContract;
use \App\DTO\Account\Create as AccountCreateDTO;

class Account implements AccountServiceContract
{

    private $accountRepository = null;

    public function __constructor(AccountRepositoryContract $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create(AccountCreateDTO $accountDTO): AccountModelContract
    {
        return null;
    }
}
