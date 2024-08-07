<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function objetivos(): BelongsToMany
    {
        return $this->belongsToMany(Objetivo::class);
    }
    
    public function ativo_tipos(): BelongsToMany
    {
        return $this->belongsToMany(AtivoTipo::class);
    }

    public function rendas(): HasMany
    {
        return $this->hasMany(Renda::class);
    }

    public function ativos(): BelongsToMany
    {
        return $this->belongsToMany(Ativo::class);
    }

    public function ativo_user()
    {
        return $this->hasMany(AtivoUser::class);
    }

    public function lancamentos(): HasManyThrough
    {
        return $this->hasManyThrough(Lancamento::class, AtivoUser::class);
    }
}
