<?php


namespace App\Contracts\Services\Account;


use App\Contracts\Models\Account\ResetPasswordModelContract;

interface ResetPasswordServiceContract
{
    public function reset(string $token, ResetPasswordModelContract $resetPasswordModel) : bool;
}
