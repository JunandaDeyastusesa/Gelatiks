<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileApplicant extends Model
{
    use HasFactory;
    protected $table = 'profile_applicants';
    protected $fillable = [
        'user_id',
        'namaLengkap',
        'kelahiran',
        'kelamin',
        'telp',
        'pendidikan',
        'domisili',
        'pengKerja1',
        'pengKerja2',
        'pengKerja3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }
}
