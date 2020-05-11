<?php


namespace App\Http\Requests\Account;
use App\Contracts\Requests\Account\ResetPasswordRequestContract;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest implements ResetPasswordRequestContract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|alpha_num|between:4,16',
            'confirm_password' => 'same:password'
        ];
    }
}

