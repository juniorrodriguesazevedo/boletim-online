<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $fields = ['rg', 'cpf', 'birth_certificate', 'phone_first', 'phone_second'];

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
            'birth_date' => ['nullable', 'date'],
            'sex' => ['nullable', 'in:M,F'],
            'cpf' => ['nullable', 'size:11', "unique:students,cpf,{$this->student->id},id"],
            'rg' => ['nullable', 'min:3', 'max:10', "unique:students,rg,{$this->student->id},id"],
            'birth_certificate' => ['nullable', 'min:3', 'max:10', "unique:students,birth_certificate,{$this->student->id},id"],
            'street' => ['nullable', 'min:3', 'max:255'],
            'district' => ['nullable', 'min:3', 'max:50'],
            'number' => ['nullable', 'min:1'],
            'name_mother' => ['nullable', 'min:3', 'max:255'],
            'name_father' => ['nullable', 'min:3', 'max:255'],
            'phone_first' => ['nullable', 'size:11'],
            'phone_second' => ['nullable', 'size:11'],
            'observation' => ['nullable', 'min:3'],
        ];
    }
}
