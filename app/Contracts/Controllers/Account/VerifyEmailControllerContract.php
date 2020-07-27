<?php


namespace App\Contracts\Controllers\Account;


use Illuminate\Http\Request;

interface VerifyEmailControllerContract
{
    public function verify(Request $request);
}
