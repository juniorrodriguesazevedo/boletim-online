<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatCPF($value) :  null,
        );
    }

    protected function phoneFirst(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatPhone($value) : null,
        );
    }

    protected function phoneSecond(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatPhone($value) : null,
        );
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'classroom_student')->withTimestamps();
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
