<?php


namespace App\Contracts\Repositories;


use App\Contracts\Model\Account as AccountModelContract;

interface Account
{
    public function create(AccountCreateDTO $accountDTO) : AccountModelContract;
}
