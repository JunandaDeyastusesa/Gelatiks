<?php

namespace App\Exports;

use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JobApplicantsExport implements FromView, WithStyles, ShouldAutoSize
{
    protected $jobId;
    protected $status;

    public function __construct($jobId, $status = null)
    {
        $this->jobId = $jobId;
        $this->status = $status;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        $query = JobApply::with(['user.profile'])
                    ->where('job_id', $this->jobId);

        // Filter berdasarkan status jika diberikan
        if ($this->status) {
            $query->where('status', ucfirst($this->status)); // Misal: 'interview'
        }

        $applicants = $query->get();
        $job = Job::findOrFail($this->jobId);

        return view('admin.jobs.export_applicants', [
            'applicants' => $applicants,
            'job' => $job,
        ]);
    }
}
