<?php


namespace App\Contracts\Repositories\Account;

use App\Contracts\Model\Account\AccountModelContract;
use App\Contracts\Model\Account\ChangeAccountPasswordModelContract;

interface AccountRepositoryContract
{
    public function create(AccountModelContract $accountModel) : AccountModelContract;
    public function changePassword(AccountModelContract $accountModel) : bool;
}
