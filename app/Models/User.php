<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids;

    // Jika menggunakan ULID sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'users';

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function profile()
    {
        return $this->hasOne(ProfileApplicant::class);
    }
}
