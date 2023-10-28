<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'class_room_id',
        'discipline_id',
        'note1',
        'note2',
        'note3',
        'note4',
        'lack1',
        'lack2',
        'lack3',
        'lack4',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'student.name',
                'class_room.name',
                'discipline.name',
                'note1',
                'note2',
                'note3',
                'note4',
                'lack1',
                'lack2',
                'lack3',
                'lack4',
                'created_at',
                'updated_at'
            ])
            ->useLogName('Notas');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function classRoom(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
