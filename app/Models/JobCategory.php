<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    // Karena ID menggunakan ULID
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'job_category'; // Laravel default-nya pakai 'job_categories'

    protected $fillable = [
        'no',
        'category_name',
    ];
}
