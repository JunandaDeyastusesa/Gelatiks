<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ApplicantsExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // header bold
        ];
    }

    public function view(): View
    {
        $applys = User::with(['roles', 'profile'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Applicants');
            })
            ->get();

        return view('admin.applicants.export_excel', compact('applys'));
    }
}
