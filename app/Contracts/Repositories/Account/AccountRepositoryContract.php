<?php

namespace App\Contracts\Repositories\Account;

use App\Contracts\Model\Account\AccountModelContract;

interface AccountRepositoryContract
{
    public function create(AccountModelContract $accountModel) : AccountModelContract;
    public function changePassword(AccountModelContract $accountModel) : bool;
    public function getByLogin(string $login) : AccountModelContract;
}
