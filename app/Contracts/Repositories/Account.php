<?php


namespace App\Contracts\Repositories;

use App\DTO\Account\AccountCreateDTO;
use App\Contracts\Model\Account\Account as AccountModelContract;

interface Account
{
    public function create(AccountCreateDTO $accountDTO) : AccountModelContract;
}
