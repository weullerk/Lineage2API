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
        return response(['message' => 'Um email com o link para registrar uma nova senha foi enviado para o seu email.']);
    }
}
