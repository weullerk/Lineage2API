<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Entity\Account as AccountEloquent;

use App\DTO\Account\AccountCreateDTO;
use App\Contracts\Repositories\Account as AccountRepositoryContract;
use App\Contracts\Model\Account as AccountModelContract;
use \App\Models\Account\Account as AccountModel;

class Account implements AccountRepositoryContract
{
    /**
     * Cria uma nova conta e retorna null caso a operação falhe.
     * @param AccountCreateDTO $accountDTO
     * @return AccountCreateDTO
     */
    public function create(AccountCreateDTO $accountDTO) : AccountModelContract
    {
        $account = new AccountEloquent();
        $account->login = $accountDTO->getLogin();
        $account->password = $accountDTO->getPassword();
        $account->email = $accountDTO->getEmail();
        $account->lastactive = 0;
        $account->accessLevel = 0;
        $account->lastIP = '0.0.0.0';
        $account->lastServer = 1;

        if ($account->save())
        {
            $accountModel = new AccountModel();
            $accountModel->setLogin($account->login);
            $accountModel->setPassword($account->password);
            $accountModel->setEmail($account->email);
            $accountModel->setAccessLevel($account->accessLevel);

            return $accountModel;
        }
        else
        {
            return null;
        }
    }
}
