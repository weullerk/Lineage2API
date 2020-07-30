<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Controllers\Account\ResetPasswordControllerContract;
use App\Contracts\Requests\Account\ResetPasswordRequestContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller implements ResetPasswordControllerContract
{

    public function reset(ResetPasswordRequestContract $request)
    {
        $token = $request->input('token');

        $service = app('App\Contracts\Services\Account\ResetPasswordServiceContract');

        $resetPasswordModel = app('App\Contracts\Models\Account\ResetPasswordModelContract');
        $resetPasswordModel->setEmail($request->input('email'));
        $resetPasswordModel->setNewPassword($request->input('password'));
        $resetPasswordModel->setConfirmPassword($request->input('confirm_password'));

        $service->reset($token, $resetPasswordModel);
        return response(['message' => 'Password atualizado com sucesso!']);
    }
}
