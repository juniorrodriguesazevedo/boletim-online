<?php

namespace App\Http\Requests\ClassRooms;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['nullable', 'min:3'],
            'name' => ['nullable', 'min:3', 'max:255'],
            'period' => ['nullable', 'in:1,2,3'],
            'year' => ['nullable'],
            'students' => ['nullable', 'array'],
            'teachers' => ['nullable', 'array'],
            'disciplines' => ['nullable', 'array'],
        ];
    }
}
