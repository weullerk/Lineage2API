<?php

namespace App\Services\Account;

use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\VerifyEmailServiceContract;
use App\Traits\L2J\L2jPasswordEncryter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerifyEmailService implements VerifyEmailServiceContract
{
    use L2jPasswordEncryter;

    private $accountRepository = null;

    public function __construct(AccountRepositoryContract $accountRepository)
    {
    }

    public function verify(string $email): bool
    {
        try {
            $accountRepository = app()->make('App\Contracts\Repositories\Account\AccountRepositoryContract');
            return !!$accountRepository->getByEmail($email);
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }
}
