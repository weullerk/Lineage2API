<?php


namespace App\Services\Account;

use \App\Contracts\Services\CreateAccountServiceContract;
use \App\Contracts\Repositories\AccountRepository as AccountRepositoryContract;
use \App\DTO\Account\Create as AccountCreateDTO;
use App\Exceptions\FailureException;

class CreateAccountService implements CreateAccountServiceContract
{

    private $accountRepository = null;

    public function __constructor(AccountRepositoryContract $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create(AccountCreateDTO $accountDTO): AccountCreateDTO
    {
        $this->accountRepository->create($accountDTO);
    }
}
