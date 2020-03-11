<?php


namespace App\Repositories\L2JEloquentMariaDB\Account;

use App\Contracts\Model\Account\AccountModelContract;
use App\Exceptions\FailureException;


use App\Contracts\Repositories\Account\CreateAccountRepositoryContract;
use App\Contracts\Repositories\Account\AccountEntityContract;

class CreateAccountRepository implements CreateAccountRepositoryContract
{
    /**
     * Cria uma nova conta e retorna null caso a operação falhe.
     * @param AccountCreateDTO $accountDTO
     * @return AccountCreateDTO
     */
    public function create(AccountModelContract $accountModel) : AccountModelContract
    {
        $account = $this->app->make('AccountEntityContract');
        $account->login = $accountModel->getLogin();
        $account->password = $accountModel->getPassword();
        $account->email = $accountModel->getEmail();
        $account->lastactive = 0;
        $account->accessLevel = 0;
        $account->lastIP = '0.0.0.0';
        $account->lastServer = 1;

        if (!$account->save())
            throw new FailureException("Error ao realizar o cadastro.");

        $accountModel = $this->app->make('AccountModelContract');
        $accountModel->setLogin($account->login);
        $accountModel->setPassword($account->password);
        $accountModel->setEmail($account->email);
        $accountModel->setAccessLevel($account->accessLevel);

        return $accountModel;
    }
}
