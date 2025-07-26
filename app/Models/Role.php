<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Karena menggunakan ULID sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no',
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');
    }
}
