<?php


namespace App\Contracts\Controllers\Auth;

use App\Contracts\Requests\Auth\AuthRequestContract;

interface AuthControllerContract
{
    public function auth(AuthRequestContract $request);
}
