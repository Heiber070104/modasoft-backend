<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:50|unique:sizes,name',
                'category_id' => 'required|exists:categories,id',
            ];
        }

        $id = $this->route('id');

        return [
            'name' => 'sometimes|required|string|max:50|unique:sizes,name,' . $id,
            'category_id' => 'sometimes|required|exists:categories,id',
        ];
    }
}