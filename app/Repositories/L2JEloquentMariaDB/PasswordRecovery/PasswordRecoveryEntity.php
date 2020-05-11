<?php

namespace App\Repositories\L2JEloquentMariaDB\PasswordRecovery;

use App\Contracts\Repositories\PasswordRecovery\PasswordRecoveryEntityContract;
use Illuminate\Database\Eloquent\Model;

class PasswordRecoveryEntity extends Model implements PasswordRecoveryEntityContract
{
    protected $table = 'password_recovery';
}
