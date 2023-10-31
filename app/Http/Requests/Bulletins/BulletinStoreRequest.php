<?php

namespace App\Http\Requests\Bulletins;

use Illuminate\Foundation\Http\FormRequest;

class BulletinStoreRequest extends FormRequest
{
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
