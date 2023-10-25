<?php

namespace App\Http\Requests\ClassRooms;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomStoreRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'period' => ['required', 'in:1,2,3'],
            'year' => ['required'],
            'students' => ['required', 'array'],
            'teachers' => ['required', 'array'],
            'disciplines' => ['required', 'array'],
        ];
    }
}
