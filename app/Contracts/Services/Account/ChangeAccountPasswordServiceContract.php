<?php


namespace App\Contracts\Services\Account;



use App\Contracts\Models\Account\AccountModelContract;
use App\Contracts\Models\Account\ChangeAccountPasswordModelContract;

interface ChangeAccountPasswordServiceContract
{
    public function changePassword(AccountModelContract $account, ChangeAccountPasswordModelContract $changePasswordModel) : bool;
}
