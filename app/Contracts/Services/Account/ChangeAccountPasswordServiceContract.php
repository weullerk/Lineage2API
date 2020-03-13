<?php


namespace App\Contracts\Services\Account;



use App\Contracts\Model\Account\AccountModelContract;
use App\Contracts\Model\Account\ChangeAccountPasswordModelContract;

interface ChangeAccountPasswordServiceContract
{
    public function changePassword(AccountModelContract $account, ChangeAccountPasswordModelContract $changePasswordModel) : bool;
}
