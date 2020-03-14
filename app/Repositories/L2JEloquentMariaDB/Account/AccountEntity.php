<?php

namespace App\Repositories\L2JEloquentMariaDB\Account;

use App\Contracts\Repositories\Account\AccountEntityContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AccountEntity extends Authenticatable implements AccountEntityContract
{
    protected $table = 'accounts';

    protected $visible = ['login', 'password', 'email', 'lastactive', 'accessLevel', 'lastIP', 'lastServer'];

    protected $primaryKey = 'login';

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

    public function getAuthIdentifierName()
    {
        return 'login';
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
