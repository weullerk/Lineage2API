<?php


namespace App\Contracts\Controllers\Account;


use App\Contracts\Requests\Account\RecoveryPasswordRequestContract;

interface RecoveryPasswordControllerContract
{
    public function recovery(RecoveryPasswordRequestContract $request);
}
