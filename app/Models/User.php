<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // === Relasi ke tabel lain ===

    // Setiap User punya 1 Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Setiap User bisa mencatat banyak Penjualan
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
