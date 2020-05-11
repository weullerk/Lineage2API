<?php


namespace App\Contracts\Services\Account;


use App\Contracts\Models\Account\AccountModelContract;

interface CreateAccountServiceContract
{
    public function create(AccountModelContract $accountModel) : AccountModelContract;
}
