<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory, HasUlids;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'job_applies';

    protected $fillable = [
        'id',
        'job_id',
        'user_id',
        'status',
        'keterangan',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportInterviewTCTL(){
        return $this->hasMany(ReportInterview::class, 'job_apply_id');
    }

    public function reportInterviewMDSPG(){
        return $this->hasMany(ReportInterviewSPGMD::class, 'job_apply_id');
    }

}
