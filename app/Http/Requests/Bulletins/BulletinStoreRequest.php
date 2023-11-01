<?php

namespace App\Http\Requests\Bulletins;

use Illuminate\Foundation\Http\FormRequest;

class BulletinStoreRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'date' => date("Y-m-d", strtotime(str_replace('/', '-', $this->date))),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:students,id'],
            'date' => ['required', 'date'],
        ];
    }
}
