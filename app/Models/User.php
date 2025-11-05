<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_hp',
        'foto_profile',
        'status_akun',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPencari(): bool
    {
        return $this->role === 'pencari';
    }

    public function isPemberi(): bool
    {
        return $this->role === 'pemberi';
    }

    public function isAktif(): bool
    {
        return $this->status_akun === 'aktif';
    }

    public function isNonaktif(): bool
    {
        return $this->status_akun === 'nonaktif';
    }

    public function isSuspend(): bool
    {
        return $this->status_akun === 'suspend';
    }
}
