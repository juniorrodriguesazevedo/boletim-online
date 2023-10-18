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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'cns',
        'phone',
        'sex',
        'color',
        'naturalness',
        'status',
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
                'cns',
                'phone',
                'sex',
                'color',
                'naturalness',
                'status',
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

    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatCPF($value) :  null,
        );
    }

    protected function cns(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatCNS($value) : null,
        );
    }

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value ? formatPhone($value) : null,
        );
    }

    protected function cep(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value ? formatCEP($value) : null,
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

}
