<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'period',
        'year'
    ];

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
