<?php


namespace App\Contracts\Services;

use \App\Contracts\Model\Account as AccountModelContract;
use \App\DTO\Account\Create as AccountCreateDTO;

interface Account
{
    public function create(AccountCreateDTO $accountDTO) : AccountCreateDTO;
}
