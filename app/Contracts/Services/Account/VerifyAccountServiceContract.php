<?php

namespace App\Contracts\Services\Account;

interface VerifyAccountServiceContract
{
    public function verify(string $login) : bool;
}
