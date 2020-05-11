<?php


namespace App\Contracts\Services\Account;


use App\Contracts\Models\Account\AccountModelContract;

interface RecoveryPasswordServiceContract
{
    public function recovery(string $email) : bool;
}
