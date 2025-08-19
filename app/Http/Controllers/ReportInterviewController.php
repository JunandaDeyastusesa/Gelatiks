<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\ReportInterview;
use App\Models\ReportInterviewSPGMD;
use App\Models\ReportInterviewPCTL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportInterviewController extends Controller
{

    public function viewFormPCTL($id)
    {
        $jobApply = JobApply::with('reportInterviewTCTL')->findOrFail($id);
        $today = now();

        return view('admin.reportInterview.create_PC_TL', compact('jobApply', 'today'));
    }

    public function viewFormSPGMD($id)
    {
        $jobApply = JobApply::with('reportInterviewMDSPG')->findOrFail($id);
        $today = now();

        return view('admin.reportInterview.create_SPG_MD', compact('jobApply', 'today'));
    }


    public function storeFormPCTL(Request $request)
    {
        $validated = $request->validate([
            'job_apply_id'             => 'required|exists:job_applies,id',
            'no_tes'                   => 'required|string|max:255',
            'tujuan_tes'               => 'required|string|max:255',
            'tanggal_tes'              => 'required|date',
            'kota_tes'                 => 'required|string|max:255',

            'analytical_thinking'      => 'required|integer|min:1|max:10',
            'achievement_orientation'  => 'required|integer|min:1|max:10',
            'integrity'                => 'required|integer|min:1|max:10',
            'willingness_to_learn'     => 'required|integer|min:1|max:10',
            'self_confidence'          => 'required|integer|min:1|max:10',
            'adaptability'             => 'required|integer|min:1|max:10',
            'teamwork'                 => 'required|integer|min:1|max:10',
            'interpersonal_skills'     => 'required|integer|min:1|max:10',
            'communication'            => 'required|integer|min:1|max:10',
            'knowledge'                => 'required|integer|min:1|max:10',
            'skill'                    => 'required|integer|min:1|max:10',

            'hasil_seleksi'            => 'required|in:Sesuai,Dipertimbangkan,Ditolak',
            'catatan'                  => 'nullable|string',
            'ket'                      => 'nullable|string',
        ]);

        $validated['hr_id'] = Auth::id();

        ReportInterview::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Report Interview berhasil disimpan.');
    }

    public function storeFormSPGMD(Request $request)
    {
        $validated = $request->validate([
            'job_apply_id'    => 'required|exists:job_applies,id',
            'no_tes'          => 'nullable|string|max:255',
            'tujuan_tes'      => 'nullable|string|max:255',
            'tanggal_tes'     => 'required|date',
            'kota_tes'        => 'required|string|max:255',

            // --- PENAMPILAN ---
            'penampilan_sopan_rapi'    => 'required|integer|min:0',
            'penampilan_sesuai_posisi' => 'required|integer|min:0',
            'penampilan_pede'          => 'required|integer|min:0',
            'catatan_penampilan'       => 'nullable|string',

            // --- KOMUNIKASI ---
            'komunikasi_baik'          => 'required|integer|min:0',
            'komunikasi_runtut'        => 'required|integer|min:0',
            'komunikasi_tegas'         => 'required|integer|min:0',
            'catatan_komunikasi'       => 'nullable|string',

            // --- PENDIDIKAN ---
            'pendidikan_sesuai'        => 'required|integer|min:0',
            'catatan_pendidikan'       => 'nullable|string',

            // --- LATAR BELAKANG ---
            'latar_tempat_tinggal'     => 'required|integer|min:0',
            'latar_penempatan'         => 'required|integer|min:0',
            'latar_kesehatan'          => 'required|integer|min:0',
            'latar_hukum'              => 'required|integer|min:0',
            'catatan_latar'            => 'nullable|string',

            // --- SKILL ---
            'skill_sesuai'             => 'required|integer|min:0',
            'skill_koordinasi'         => 'required|integer|min:0',
            'skill_negosiasi'          => 'required|integer|min:0',
            'skill_aplikasi'           => 'required|integer|min:0',
            'catatan_skill'            => 'nullable|string',

            // --- KNOWLEDGE ---
            'knowledge_pekerjaan'      => 'required|integer|min:0',
            'knowledge_tugas'          => 'required|integer|min:0',
            'knowledge_team'           => 'required|integer|min:0',
            'knowledge_pressure'       => 'required|integer|min:0',
            'knowledge_digital'        => 'required|integer|min:0',
            'catatan_knowledge'        => 'nullable|string',

            // --- ATTITUDE ---
            'attitude_posisi'          => 'required|integer|min:0',
            'attitude_kritikan'        => 'required|integer|min:0',
            'attitude_positif'         => 'required|integer|min:0',
            'catatan_attitude'         => 'nullable|string',

            // --- MOTIVASI ---
            'motivasi_target'          => 'required|integer|min:0',
            'motivasi_tujuan'          => 'required|integer|min:0',
            'motivasi_suasana'         => 'required|integer|min:0',
            'catatan_motivasi'         => 'nullable|string',

            // --- EXPERIENCE ---
            'exp_ilmu'                 => 'required|integer|min:0',
            'exp_posisi'               => 'required|integer|min:0',
            'exp_alasan'               => 'required|integer|min:0',
            'catatan_experience'       => 'nullable|string',

            // --- TAMBAHAN ---
            'bpjs'                     => 'required|in:Ya,Tidak',
            'catatan_bpjs'             => 'nullable|string',
            'alat_ada'                 => 'required|in:Ya,Tidak',
            'alat_beli'                => 'required|in:Ya,Tidak',
            'catatan_alat'             => 'nullable|string',

            // --- KESIMPULAN ---
            'hasil_seleksi'            => 'required|in:Sesuai,Dipertimbangkan,Ditolak',
            'catatan'                  => 'nullable|string',
            'ket'                      => 'nullable|string',
        ]);

        $validated['hr_id'] = Auth::id();

        ReportInterviewSPGMD::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Report Interview SPGMD berhasil disimpan.');
    }


    public function showFormPCTL($id)
    {
        $ReportInterview = ReportInterview::findOrFail($id);
        return view('admin.reportInterview.show_PC_TL', compact('ReportInterview'));
    }

    public function showFormSPGMD($id)
    {
        $ReportInterview = ReportInterviewSPGMD::findOrFail($id);

        return view('admin.reportInterview.show_SPG_MD', compact('ReportInterview'));
    }

    public function downloadInterviewReportSPGMD($id)
    {
        $reportInterview = ReportInterviewSPGMD::with('jobApply.user.profile')->findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'admin.reportInterview.export-SPG_MD',
            [
                'reportInterview' => $reportInterview,
                'pewawancara' => \Illuminate\Support\Facades\Auth::user()->username,
            ]
        )->setPaper('a4', 'portrait');

        return $pdf->download(
            'Risalah_Interview_SPG_MD_' . $reportInterview->jobApply->user->profile->namaLengkap . '.pdf'
        );
    }

    public function downloadInterviewReportPCTL($id)
    {
        $reportInterview = ReportInterview::with('jobApply.user.profile', 'hr')->findOrFail($id);
        $pewawancara = Auth::user()->username;

        $pdf = Pdf::loadView(
            'admin.reportInterview.export-PC_TL',
            compact('reportInterview', 'pewawancara')
        )->setPaper('a4', 'portrait');

        return $pdf->download(
            'Risalah_Interview_PC_TL_' . $reportInterview->jobApply->user->profile->namaLengkap . '.pdf'
        );
    }
}
