<?php


namespace App\Contracts\Controllers\Account;


interface VerifyEmailControllerContract
{
    public function verify(string $email);
}
