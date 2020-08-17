<?php

namespace App\Repositories\L2JEloquentMariaDB\Character;

use App\Contracts\Repositories\Character\CharacterEntityContract;
use Illuminate\Database\Eloquent\Model;

class CharacterEntity extends Model implements CharacterEntityContract
{
    protected $table = 'characters';

    protected $primaryKey = 'char_name';

    protected $keyType = 'string';
}
