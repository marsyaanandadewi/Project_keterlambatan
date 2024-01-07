<?php

namespace App\Exports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection, WithHeadings
{
    public function collection()
    {
        return student::with(['rombel', 'rayon', 'late'])
            ->select('nis', 'name', 'rombel_id', 'rayon_id')
            ->withCount('Late') 
            ->get()
            ->map(function ($student) {
                return [
                    'NIS' => $student->nis,
                    'Nama' => $student->name,
                    'Rombel' => $student->rombel->rombel,
                    'Rayon' => $student->rayon->rayon, 
                    'Total Keterlambatan' => $student->lates_count,
                ];
            });
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Rombel', 'Rayon', 'Total Keterlambatan'];
    }
} 
