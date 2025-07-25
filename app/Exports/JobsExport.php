<?php

namespace App\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JobsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    private $rowNumber = 0;

    public function collection()
    {
        return Job::select(
            'jobs_name',
            'store_name',
            'type_work',
            'gender',
            'city',
            'open_position',
            'experience',
            'education',
            'category',
            'close_date',
            'status',
            'description'
        )->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Pekerjaan',
            'Nama Toko',
            'Tipe Pekerjaan',
            'Jenis Kelamin',
            'Kota',
            'Jumlah Posisi',
            'Pengalaman',
            'Pendidikan',
            'Kategori',
            'Tanggal Tutup',
            'Deskripsi',
            'Status',
        ];
    }

    public function map($row): array
    {
        return [
            ++$this->rowNumber,
            $row->jobs_name,
            $row->store_name,
            $row->type_work,
            $row->gender,
            $row->city,
            $row->open_position,
            $row->experience,
            $row->education,
            $row->category,
            $row->close_date,
            $row->description,
            $row->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
