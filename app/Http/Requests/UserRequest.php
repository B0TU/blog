<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name'      => 'required|string',
            'email'  => 'required|string|unique:users,email',
            'password'  => 'nullable|string|min:8',
            'role'  => 'required|exists:roles,id'
        ];

        if ($user = $this->route('user')) {
            $rules['email'] .= ',' . $user->id;
        } else {
            $rules['password'] .= '|required';
        }

        return $rules;

    }
}
