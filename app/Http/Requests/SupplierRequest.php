<?php

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'identification' => 'required|string|max:255|unique:third_parties,identification',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'mobile' => 'required|string|max:20',
                'address' => 'required|string|max:500',
            ];
        }

        return [
            'identification' => 'sometimes|required|string|max:255|unique:third_parties,identification,' . $this->route('supplier'),
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|nullable|string|max:20',
            'address' => 'sometimes|nullable|string|max:500',
        ];
    }
}