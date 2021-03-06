<?php


namespace App\Http\Requests\Auth;
use App\Contracts\Requests\Auth\AuthRequestContract;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest implements AuthRequestContract
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
            'username' => 'required|alpha_num|between:4,16|exists:accounts,login',
            'password' => 'required|alpha_num|between:4,16',
        ];
    }
}

