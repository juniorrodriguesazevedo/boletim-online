<?php

namespace App\Http\Requests\Users;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $fields = ['rg', 'cpf', 'cns', 'phone'];

        foreach ($fields as $field) {
            if ($this->$field) {
                $this->merge([
                    $field => str_replace(['-', '.', ' ', '(', ')'], '', $this->$field),
                ]);
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'cns' => ['nullable', 'size:15', 'unique:users,cns',],
            'email' => ['required', 'email', 'unique:users,email', 'confirmed'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role_id' => [
                'required', 'exists:roles,id', function ($attribute, $value, $fail) {
                    if (!in_array($value, [RoleEnum::DIRECTOR, RoleEnum::PROFESSIONAL])) {
                        $fail('Inválido!');
                    }
                }
            ],
            'status' => ['required', 'boolean'],
            'color' => ['nullable'],
            'naturalness' => ['nullable'],
            'rg' => ['nullable', 'max:10'],
            'phone' => ['nullable'],
            'sex' => ['required', 'in:M,F'],
            'birth_date' => ['nullable', 'date'],
            'cpf' => ['nullable', 'size:11', 'unique:users,cpf']
        ];
    }
}
