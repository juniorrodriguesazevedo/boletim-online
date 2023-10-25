<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'sex',
        'cpf',
        'rg',
        'birth_certificate',
        'street',
        'district',
        'number',
        'name_mother',
        'name_father',
        'phone_first',
        'phone_second',
        'observation',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'classroom_student')->withTimestamps();
    }
}
