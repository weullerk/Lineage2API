<?php

namespace App\Contracts\Services\Account;

interface VerifyEmailServiceContract
{
    public function verify(string $email) : bool;
}
