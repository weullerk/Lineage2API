<?php


namespace App\Http\Requests\Account;
use App\Contracts\Requests\Account\ChangeAccountPasswordRequestContract;
use Illuminate\Foundation\Http\FormRequest;

class ChangeAccountPasswordRequest extends FormRequest implements ChangeAccountPasswordRequestContract
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
            'old_password' => 'required|alpha_num|between:4,16',
            'new_password' => 'required|alpha_num|between:4,16',
            'confirm_password' => 'required|alpha_num|between:4,16',
        ];
    }
}

