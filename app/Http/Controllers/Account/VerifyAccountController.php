<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Controllers\Account\VerifyAccountControllerContract;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class VerifyAccountController extends Controller implements VerifyAccountControllerContract
{

    public function __construct()
    {
    }

    public function verify(string $login)
    {
        $validator = Validator::make(['login' => $login], [
            'login' => 'required|alpha_num|between:4,16'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $verifyAccountService = app()->make('App\Contracts\Services\Account\VerifyAccountServiceContract');

        if ($verifyAccountService->verify($login)) {
            return response()->json([
                'exist' => true
            ]);
        }

        return response()->json([
            'exist' => false
        ]);
    }

}
