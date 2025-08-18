<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportInterviewSPGMD extends Model
{
    use HasFactory, HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'report_spg_md_interviews';

    protected $fillable = [
        'id',
        'hr_id',
        'job_apply_id',
        'no_tes',
        'tujuan_tes',
        'tanggal_tes',
        'kota_tes',

        // PENAMPILAN
        'penampilan_sopan_rapi',
        'penampilan_sesuai_posisi',
        'penampilan_pede',
        'catatan_penampilan',

        // KOMUNIKASI
        'komunikasi_baik',
        'komunikasi_runtut',
        'komunikasi_tegas',
        'catatan_komunikasi',

        // PENDIDIKAN
        'pendidikan_sesuai',
        'catatan_pendidikan',

        // LATAR BELAKANG
        'latar_tempat_tinggal',
        'latar_penempatan',
        'latar_kesehatan',
        'latar_hukum',
        'catatan_latar',

        // SKILL
        'skill_sesuai',
        'skill_koordinasi',
        'skill_negosiasi',
        'skill_aplikasi',
        'catatan_skill',

        // KNOWLEDGE
        'knowledge_pekerjaan',
        'knowledge_tugas',
        'knowledge_team',
        'knowledge_pressure',
        'knowledge_digital',
        'catatan_knowledge',

        // ATTITUDE
        'attitude_posisi',
        'attitude_kritikan',
        'attitude_positif',
        'catatan_attitude',

        // MOTIVASI
        'motivasi_target',
        'motivasi_tujuan',
        'motivasi_suasana',
        'catatan_motivasi',

        // EXPERIENCE
        'exp_ilmu',
        'exp_posisi',
        'exp_alasan',
        'catatan_experience',

        // TAMBAHAN
        'bpjs',
        'catatan_bpjs',
        'alat_ada',
        'alat_beli',
        'catatan_alat',

        // KESIMPULAN
        'hasil_seleksi',
        'catatan',
        'ket',
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
