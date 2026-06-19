<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:50|unique:categories,name',
                'is_active' => 'sometimes|boolean',
            ];
        }

        $id = $this->route('id');

        return [
            'name' => 'sometimes|required|string|max:50|unique:categories,name,' . $id,
        ];
    }
}