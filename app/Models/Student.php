<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
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
                'created_at',
                'updated_at'
            ])
            ->useLogName('Alunos');
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucfirst($value),
        );
    }

    protected function idName(): Attribute
    {
        return Attribute::make(
            get: fn () => '#' . $this->id . ' - ' . $this->name,
        );
    }

    protected function nameMother(): Attribute
    {
        return Attribute::make(
            set: fn (string | null $value) => $value ? ucfirst($value) : null,
        );
    }

    protected function nameFather(): Attribute
    {
        return Attribute::make(
            set: fn (string | null $value) => $value ? ucfirst($value) : null,
        );
    }

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

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'classroom_student')->withTimestamps();
    }
}
