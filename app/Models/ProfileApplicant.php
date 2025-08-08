<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ProfileApplicant extends Model
{
    use HasFactory, HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'profile_applicants';
    protected $fillable = [
        'user_id',
        'category',
        'namaLengkap',
        'kelahiran',
        'kelamin',
        'telp',
        'pendidikan',
        'domisili',
        'pengKerja1',
        'pengKerja2',
        'pengKerja3',
        'docCV',
        'photo'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
