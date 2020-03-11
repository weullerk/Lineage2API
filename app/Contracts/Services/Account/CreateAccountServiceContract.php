<?php


namespace App\Contracts\Services\Account;

use \App\DTO\Account\Create as AccountCreateDTO;

interface CreateAccountServiceContract
{
    public function create(AccountCreateDTO $accountDTO) : AccountCreateDTO;
}
