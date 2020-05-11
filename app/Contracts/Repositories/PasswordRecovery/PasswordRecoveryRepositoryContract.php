<?php

namespace App\Contracts\Repositories\PasswordRecovery;

use App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract;

interface PasswordRecoveryRepositoryContract
{
    public function create(PasswordRecoveryModelContract $passwordRecoveryModel) : PasswordRecoveryModelContract;
    public function deactivate(int $id) : bool;
    public function getByToken(string $token) : PasswordRecoveryModelContract;
}
