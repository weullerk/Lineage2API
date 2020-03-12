<?php

namespace App\Repositories\L2JEloquentMariaDB\Account;

use App\Contracts\Repositories\Account\AccountEntityContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AccountEntity extends Authenticatable implements AccountEntityContract
{
    protected $table = 'accounts';

    protected $visible = ['login', 'email', 'lastactive', 'accessLevel', 'lastIP', 'lastServer'];

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
