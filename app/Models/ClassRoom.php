<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'code',
        'name',
        'period',
        'year'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'code',
                'name',
                'period',
                'year',
                'created_at',
                'updated_at'
            ])
            ->useLogName('Turmas');
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucfirst($value),
        );
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'classroom_student')->withTimestamps();
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'classroom_discipline')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'classroom_user')->withTimestamps();
    }
}
