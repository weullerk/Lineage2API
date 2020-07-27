<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Controllers\Account\VerifyEmailControllerContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class VerifyEmailController extends Controller implements VerifyEmailControllerContract
{

    public function __construct()
    {
    }

    public function verify(Request $request)
    {
        $email = $request->input('email');
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $verifyEmailService = app()->make('App\Contracts\Services\Account\VerifyEmailServiceContract');

        if ($verifyEmailService->verify($email)) {
            return response()->json([
                'exists' => true
            ]);
        }

        return response()->json([
            'exists' => false
        ]);
    }

}
