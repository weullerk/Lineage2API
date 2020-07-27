<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'v1'], function() {
    return Route::post('account/change-password', 'App\Contracts\Controllers\Account\ChangeAccountPasswordControllerContract@change');
});

Route::prefix('v1')->group(function() {
    Route::post('auth', 'App\Contracts\Controllers\Auth\AuthControllerContract@auth');

    Route::get('account/verify-account', 'App\Contracts\Controllers\Account\VerifyAccountControllerContract@verify');
    Route::get('account/verify-email', 'App\Contracts\Controllers\Account\VerifyEmailControllerContract@verify');
    Route::get('account/recovery-password', 'App\Contracts\Controllers\Account\RecoveryPasswordControllerContract@recovery');
    Route::post('account/reset-password/{token}', 'App\Contracts\Controllers\Account\ResetPasswordControllerContract@reset');
    Route::post('account/create', 'App\Contracts\Controllers\Account\CreateAccountControllerContract@create');
});
