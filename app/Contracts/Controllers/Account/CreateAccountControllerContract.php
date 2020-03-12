<?php


namespace App\Contracts\Controllers\Account;


use App\Contracts\Requests\Account\CreateAccountRequestContract;

interface CreateAccountControllerContract
{
    public function create(CreateAccountRequestContract $request);
}
