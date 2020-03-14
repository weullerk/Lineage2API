<?php


namespace App\Http\Controllers\Auth;


use App\Contracts\Controllers\Auth\AuthControllerContract;
use App\Contracts\Requests\Auth\AuthRequestContract;
use App\Http\Controllers\Controller;
use App\Traits\L2J\L2jPasswordEncryter;

class AuthController extends Controller implements AuthControllerContract
{
    use L2jPasswordEncryter;

    public function __construct()
    {
    }

    public function auth(AuthRequestContract $request)
    {
        $credentials = array(
            'login' => $request->input('login'),
            'password' => $this->l2jPasswordEncrypt($request->input('password'))
        );



        if (!$token = auth('api')->attempt($credentials)) {
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
