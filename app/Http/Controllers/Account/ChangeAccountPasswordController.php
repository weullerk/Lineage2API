<?php


namespace App\Http\Controllers\Account;


use App\Contracts\Controllers\Account\ChangeAccountPasswordControllerContract;
use App\Contracts\Requests\Account\ChangeAccountPasswordRequestContract;
use App\Http\Controllers\Controller;

class ChangeAccountPasswordController extends Controller implements ChangeAccountPasswordControllerContract
{

    public function __construct()
    {
    }

    public function change(ChangeAccountPasswordRequestContract $request)
    {
        $user = auth('api')->user();

        $accountModel = app()->make('App\Contracts\Model\Account\AccountModelContract');
        $accountModel->setLogin($user->login);
        $accountModel->setPassword($user->password);

        $changeAccountPasswordModel = app()->make('App\Contracts\Model\Account\ChangeAccountPasswordModelContract');
        $changeAccountPasswordModel->setOldPassword($request->old_password);
        $changeAccountPasswordModel->setNewPassword($request->new_password);
        $changeAccountPasswordModel->setConfirmPassword($request->confirm_password);

        $changeAccountPasswordService = app()->make('App\Contracts\Services\Account\ChangeAccountPasswordServiceContract');
        $changeAccountPasswordService->changePassword($accountModel, $changeAccountPasswordModel);

        return response()->json([
            'message' => 'Senha atualizada com sucesso.',
        ]);
    }

}
