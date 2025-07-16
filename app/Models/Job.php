<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Jika menggunakan ULID sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'jobs_name',
        'store_name',
        'type_work',
        'gender',
        'city',
        'qty',
        'experience',
        'education',
        'close_date',
        'status',
        'description',
    ];

    protected $casts = [
        'close_date' => 'date',
    ];
}
