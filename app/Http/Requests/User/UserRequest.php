<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'username' => 'required|string|max:50|unique:users,username',
                'personal_name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required|string|in:admin,manager,seller,buyer,accountant',
            ];
        }

        $id = $this->route('id');

        return [
            'username' => 'sometimes|required|string|max:50|unique:users,username,' . $id,
            'personal_name' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'sometimes|string|in:admin,manager,seller,buyer,accountant',
        ];
    }
}
