<?php


namespace App\Contracts\Mails\RecoveryPassword;


interface RecoveryPasswordMailContract
{
    public function __construct(string $login, string $url);
}
