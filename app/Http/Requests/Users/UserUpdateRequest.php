<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['nullable', 'min:3', 'max:255'],
            'cns' => ['nullable', 'size:15', "unique:users,cns,{$this->user->id},id"],
            'email' => ['nullable', 'email', "unique:users,email,{$this->user->id},id", 'confirmed'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'status' => ['nullable', 'boolean'],
            'color' => ['nullable'],
            'naturalness' => ['nullable'],
            'rg' => ['nullable', 'max:10'],
            'phone' => ['nullable'],
            'sex' => ['nullable', 'in:M,F'],
            'birth_date' => ['nullable', 'date'],
            'cpf' => ['nullable', 'size:11', "unique:users,cpf,{$this->user->id},id"]
        ];
    }
}
