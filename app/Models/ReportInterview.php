<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportInterview extends Model
{
    use HasFactory, HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'report_pc_tl_interviews';

    protected $fillable = [
        'id',
        'hr_id',
        'job_apply_id',
        'no_tes',
        'tujuan_tes',
        'tanggal_tes',
        'kota_tes',
        'analytical_thinking',
        'achievement_orientation',
        'integrity',
        'willingness_to_learn',
        'self_confidence',
        'adaptability',
        'teamwork',
        'interpersonal_skills',
        'communication',
        'knowledge',
        'skill',
        'catatan',
        'ket',
    ];

    protected $casts = [
        'tanggal_tes' => 'date',
    ];

    public function hr()
    {
        return $this->belongsTo(User::class, 'hr_id');
    }

    public function jobApply()
    {
        return $this->belongsTo(JobApply::class, 'job_apply_id');
    }
}
