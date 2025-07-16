<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobConnCategory extends Model
{
    use HasFactory;

    // Karena ID menggunakan ULID
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'job_conn_category';

    protected $fillable = [
        'job_id',
        'category_id',
    ];

    // Relasi ke Job
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    // Relasi ke JobCategory
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }
}
