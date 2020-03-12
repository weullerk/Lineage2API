<?php


namespace App\Contracts\Services\Account;


use App\Contracts\Model\Account\AccountModelContract;

interface CreateAccountServiceContract
{
    public function create(AccountModelContract $accountModel) : AccountModelContract;
}
