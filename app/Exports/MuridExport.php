<?php

namespace App\Exports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MuridExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Murid::with('kelas')
            ->get()
            ->map(function ($m) {
                return [
                    'nisn'           => $m->nisn,
                    'nama'           => $m->nama,
                    'kelas'          => $m->kelas->nama_kelas ?? '-',
                    'wali_kelas'     => $m->kelas->wali_kelas ?? '-',
                    'jenis_kelamin'  => $m->jenis_kelamin,
                    'no_hp'          => $m->no_hp,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Kelas',
            'Wali Kelas',
            'Jenis Kelamin',
            'No HP',
        ];
    }
}
