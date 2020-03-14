<?php


namespace App\Repositories\L2JEloquentMariaDB\Account;

use App\Contracts\Model\Account\AccountModelContract;
use App\Contracts\Model\Account\ChangeAccountPasswordModelContract;
use App\Exceptions\FailureException;


use App\Contracts\Repositories\Account\AccountRepositoryContract;

class AccountRepository implements AccountRepositoryContract
{
    /**
     * Cria uma nova conta e retorna null caso a operação falhe.
     * @param AccountCreateDTO $accountModel
     * @return AccountCreateDTO
     */
    public function create(AccountModelContract $accountModel) : AccountModelContract
    {
        $account = app()->make('App\Contracts\Repositories\Account\AccountEntityContract');
        $account->login = $accountModel->getLogin();
        $account->password = $accountModel->getPassword();
        $account->email = $accountModel->getEmail();
        $account->lastactive = 0;
        $account->accessLevel = 0;
        $account->lastIP = '0.0.0.0';
        $account->lastServer = 1;

        if (!$account->save())
            throw new FailureException("Error ao realizar o cadastro.");

        $accountModel = app()->make('App\Contracts\Model\Account\AccountModelContract');
        $accountModel->setLastactive($account->lastactive);
        $accountModel->setAccessLevel($account->accessLevel);
        $accountModel->setLastIP($account->accessLevel);
        $accountModel->setLastServer($account->lastServer);

        return $accountModel;
    }

    public function changePassword(AccountModelContract $accountModel): bool
    {
        $account = AccountEntity::where('login', $accountModel->getLogin())->first();
        $account->password = $accountModel->getPassword();
        return $account->save();
    }
}
