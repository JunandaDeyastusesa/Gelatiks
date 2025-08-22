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
        'id',
        'jobs_name',
        'store_name',
        'type_work',
        'gender',
        'city',
        'open_position',
        'experience',
        'education',
        'close_date',
        'category',
        'status',
        'description',
    ];

    protected $casts = [
        'close_date' => 'date',
    ];

    public function applies()
    {
        return $this->hasMany(JobApply::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'job_applies', 'job_id', 'user_id');
    }
}
