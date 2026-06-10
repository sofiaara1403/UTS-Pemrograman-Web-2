<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Mahasiswa::with('jurusan')
            ->get()
            ->map(function ($m) {
                return [
                    'NIM' => $m->nim,
                    'Nama' => $m->nama,
                    'Jurusan' => $m->jurusan->nama_jurusan
                ];
            });
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Jurusan'
        ];
    }
}