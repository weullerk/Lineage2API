<?php


namespace App\Repositories\L2JEloquentMariaDB\PasswordRecovery;


use App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract;
use App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryRepositoryContract;

class PasswordRecoveryRepository implements PasswordRecoveryRepositoryContract
{

    public function create(PasswordRecoveryModelContract $passwordRecoveryModel): PasswordRecoveryModelContract
    {
        $entity = app('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryEntityContract');
        $entity->login = $passwordRecoveryModel->getLogin();
        $entity->token = $passwordRecoveryModel->getToken();
        $entity->expiration_time = $passwordRecoveryModel->getExpirationTime();
        $entity->active = $passwordRecoveryModel->getActive();
        $entity->save();

        $passwordRecoveryModel->setId($entity->id);
        return $passwordRecoveryModel;
    }

    public function deactivate(int $id): bool
    {
        $entity = app('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryEntityContract')::find($id);
        $entity->active = false;
        return $entity->save();
    }

    public function getByToken(string $token): PasswordRecoveryModelContract
    {
        $entity = app('App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryEntityContract')::where('token', $token);
        $model = app('App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract');
        $model->setId($model->id);
        $model->setLogin($entity->login);
        $model->setToken($entity->token);
        $model->setExpirationTime($entity->expirationTime);
        $model->setActive($entity->active);

        return $model;
    }
}
