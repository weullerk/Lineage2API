<?php


namespace App\Contracts\Controllers\Account;


use Illuminate\Http\Request;

interface VerifyAccountControllerContract
{
    public function verify(Request $request);
}
