<?php


namespace App\Http\Controllers\Account;


use App\Contracts\Controllers\Account\AuthControllerContract;
use App\Contracts\Controllers\Account\CreateAccountControllerContract;
use App\Contracts\Requests\Account\AuthRequestContract;
use App\Contracts\Requests\Account\CreateAccountRequestContract;
use App\Http\Controllers\Controller;
use App\Traits\L2J\L2jPasswordEncryter;

class CreateAccountController extends Controller implements AuthControllerContract
{
    use L2jPasswordEncryter;

    public function __construct()
    {
    }

    public function auth(AuthRequestContract $request)
    {
        $credentials = [
            'login' => $request->input('login'),
            'password' => $this->l2jPasswordEncrypt($request->input('password'))
        ];

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Usuário e senha não conferem.'
            ], 401);
        }

        return response()->json([
            'token' => $token,
            'message' => 'Autenticação realizada com sucesso'
        ]);
    }

}
