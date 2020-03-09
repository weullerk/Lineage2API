<?php

namespace App\Repositories\Eloquent\Entity;

use \App\Contracts\Repositories\Entity\Account as AccountContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable implements AccountContract
{
    protected $tables = ['login', 'password', 'email', 'lastactive', 'accessLevel', 'lastIP', 'lastServer'];

    protected $primaryKey = 'account_name';

    protected $keyType = 'string';

    public function getPasswordAttribute($value)
    {
        return bcrypt($value);
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
    }
}
