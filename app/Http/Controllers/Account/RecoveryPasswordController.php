<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Controllers\Account\RecoveryPasswordControllerContract;
use App\Contracts\Requests\Account\RecoveryPasswordRequestContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecoveryPasswordController extends Controller implements RecoveryPasswordControllerContract
{
    public function recovery(RecoveryPasswordRequestContract $request)
    {
        $service = app('App\Contracts\Services\Account\RecoveryPasswordServiceContract');
        $service->recovery($request->input('email'));
        return response(['message' => 'Um email contendo o link para criar uma nova senha para sua conta foi enviado para o seu email.']);
    }
}
