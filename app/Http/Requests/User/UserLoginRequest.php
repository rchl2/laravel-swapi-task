<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
