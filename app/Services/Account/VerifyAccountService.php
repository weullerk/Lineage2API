<?php

namespace App\Services\Account;

use App\Contracts\Repositories\Account\AccountRepositoryContract;
use App\Contracts\Services\Account\VerifyAccountServiceContract;
use App\Traits\L2J\L2jPasswordEncryter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerifyAccountService implements VerifyAccountServiceContract
{
    use L2jPasswordEncryter;

    private $accountRepository = null;

    public function __construct(AccountRepositoryContract $accountRepository)
    {
    }

    public function verify(string $login): bool
    {
        try {
            $accountRepository = app()->make('App\Contracts\Repositories\Account\AccountRepositoryContract');
            return !!$accountRepository->getByLogin($login);
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }
}
