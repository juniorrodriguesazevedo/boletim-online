<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentsStoreRequest extends FormRequest
{

    protected function prepareForValidation(): void
    {
        $fields = ['rg', 'cpf', 'phone_first', 'phone_second'];

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
            'birth_date' => ['required', 'min:3', 'max:255'],
            'sex' => ['required', 'in:M,F'],
            'cpf' => ['required', 'size:11', 'unique:students,cpf'],
            'rg' => ['nullable', 'max:10'],
            'birth_date' => ['required', 'date'],
            'street' => ['nullable'],
            'district' => ['nullable'],
            'number' => ['nullable'],
            'name_mother' => ['nullable'],
            'name_father' => ['nullable'],
            'phone_first' => ['nullable'],
            'phone_second' => ['nullable'],
            'observation' => ['nullable'],
        ];
    }
}
