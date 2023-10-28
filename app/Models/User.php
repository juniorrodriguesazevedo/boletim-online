<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'cpf',
        'rg',
        'phone',
        'sex',
        'status',
        'role_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'email',
                'birth_date',
                'cpf',
                'rg',
                'phone',
                'sex',
                'status',
                'created_at',
                'updated_at'
            ])
            ->useLogName('Usuários');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucfirst($value),
        );
    }

    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatCPF($value) :  null,
        );
    }

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatPhone($value) : null,
        );
    }

    protected function setPasswordAttribute(string | null $value): void
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function classrooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'classroom_user')->withTimestamps();
    }
}
