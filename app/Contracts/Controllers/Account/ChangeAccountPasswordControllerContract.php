<?php


namespace App\Contracts\Controllers\Account;

use App\Contracts\Requests\Account\ChangeAccountPasswordRequestContract;

interface ChangeAccountPasswordControllerContract
{
    public function change(ChangeAccountPasswordRequestContract $request);
}
