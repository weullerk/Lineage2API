<?php


namespace App\Repositories\Eloquent;

use App\Exceptions\FailureException;
use App\Repositories\Eloquent\Entity\Account as AccountEloquent;

use App\DTO\Account\AccountCreateDTO;
use App\Contracts\Repositories\Account as AccountRepositoryContract;
use App\Contracts\Model\Account\Account as AccountModelContract;

class Account implements AccountRepositoryContract
{
    /**
     * Cria uma nova conta e retorna null caso a operação falhe.
     * @param AccountCreateDTO $accountDTO
     * @return AccountCreateDTO
     */
    public function create(AccountCreateDTO $accountDTO) : AccountModelContract
    {
        $account = $this->app->make('AccountEloquent');
        $account->login = $accountDTO->getLogin();
        $account->password = $accountDTO->getPassword();
        $account->email = $accountDTO->getEmail();
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
