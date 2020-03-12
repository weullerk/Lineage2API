<?php


namespace App\Http\Requests\Account;
use App\Contracts\Requests\Account\CreateAccountRequestContract;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest implements CreateAccountRequestContract
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
    // todo fix confirm_password that is not validating
    public function rules()
    {
        return [
            'login' => 'required|alpha_num|between:4,16|unique:accounts,login',
            'password' => 'required|alpha_num|between:4,16',
            'confirm_password_' => 'same:password',
            'email' => 'required|email|unique:accounts,email'
        ];
    }
}

