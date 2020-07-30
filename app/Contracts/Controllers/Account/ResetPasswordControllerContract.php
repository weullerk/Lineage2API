<?php


namespace App\Contracts\Controllers\Account;


use App\Contracts\Requests\Account\ResetPasswordRequestContract;

interface ResetPasswordControllerContract
{
    public function reset(ResetPasswordRequestContract $request);
}
