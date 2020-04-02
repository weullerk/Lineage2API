<?php


namespace App\Contracts\Controllers\Account;


interface VerifyAccountControllerContract
{
    public function verify(string $login);
}
