<?php


namespace App\Contracts\Controllers\Account;

use App\Contracts\Requests\Account\AuthRequestContract;

interface AuthControllerContract
{
    public function auth(AuthRequestContract $request);
}
