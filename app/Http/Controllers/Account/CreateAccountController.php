<?php


namespace App\Http\Controllers\Account;


use App\Contracts\Controllers\Account\CreateAccountControllerContract;
use App\Contracts\Requests\Account\CreateAccountRequestContract;
use App\Http\Controllers\Controller;

class CreateAccountController extends Controller implements CreateAccountControllerContract
{

    public function __construct()
    {
    }

    public function create(CreateAccountRequestContract $request)
    {
        $accountModel = app()->make('App\Contracts\Model\Account\AccountModelContract');
        $accountModel->setLogin($request->input('login'));
        $accountModel->setPassword($request->input('password'));
        $accountModel->setEmail($request->input('email'));

        $createAccountService = app()->make('App\Contracts\Services\Account\CreateAccountServiceContract');
        $createAccountService->create($accountModel);

        return response()->json([
            'message' => 'Cadastro realizado com sucesso.',
            'data' => $request->all()
        ]);
    }

}
