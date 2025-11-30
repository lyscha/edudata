<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::extend('normalize', function ($value) {
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '_', $value);
    return trim($value, '_');
});

HeadingRowFormatter::default('normalize');



class MuridImport implements OnEachRow, WithHeadingRow
{

    private function normalisasiKelas($input)
    {
        $input = strtolower(trim($input));

        preg_match('/\b(10|11|12|x|xi|xii)\b/', $input, $match);
        if (!$match) {
            throw new \Exception("Format kelas tidak valid: '$input'");
        }

        $angka = $match[1];

        $mapRomawi = [
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
            'x'  => 'X',
            'xi' => 'XI',
            'xii' => 'XII'
        ];

        $tingkat = strtoupper($mapRomawi[$angka]);

        if (str_contains($input, 'rpl')) {
            $jurusan = 'RPL';
            $brand   = 'Traspac';
        } elseif (str_contains($input, 'tei')) {
            $jurusan = 'TEI';
            $brand   = 'Panasonic';
        } elseif (str_contains($input, 'to')) {
            $jurusan = 'TO';
            $brand   = 'Yamaha';
        } else {
            throw new \Exception("Jurusan tidak dikenali dari input kelas: '$input'");
        }

        // ---- kata sampah: industri, unggulan, kelas, program, dll ----

        return "$tingkat $jurusan $brand";
    }



    public function onRow(Row $row)
    {
        $r = $row->toArray();

        DB::beginTransaction();

        try {

            if (!isset($r['kelas']) || trim($r['kelas']) == "") {
                throw new \Exception("Kolom 'kelas' wajib diisi.");
            }

            $kelasFinal = $this->normalisasiKelas($r['kelas']);

            $kelas = Kelas::where('nama_kelas', $kelasFinal)->first();

            if (!$kelas) {
                throw new \Exception("Kelas '$kelasFinal' tidak ditemukan di database.");
            }

            $noHp = preg_replace('/\D/', '', $r['no_hp'] ?? '');


            $jkRaw = strtolower(trim($r['jenis_kelamin'] ?? ''));

            $mapJk = [
                'laki_laki' => 'Laki-Laki',
                'laki-laki' => 'Laki-Laki',
                'laki laki' => 'Laki-Laki',
                'cowok'     => 'Laki-Laki',
                'l'         => 'Laki-Laki',

                'perempuan' => 'Perempuan',
                'wanita'    => 'Perempuan',
                'cewek'     => 'Perempuan',
                'p'         => 'Perempuan',
            ];

            $jenisKelamin = $mapJk[$jkRaw] ?? null;

            if (!$jenisKelamin) {
                throw new \Exception("Jenis kelamin tidak valid: '{$r['jenis_kelamin']}'");
            }

            $user = User::create([
                'name'     => $r['username'],
                'email'    => $r['email'],
                'password' => Hash::make($r['password']),
                'role'     => 'murid'
            ]);

            Murid::create([
                'user_id'       => $user->id,
                'nisn'          => $r['nisn'],
                'nama'          => $r['nama'],
                'kelas_id'      => $kelas->id,
                'jenis_kelamin' => $jenisKelamin,
                'no_hp'         => $noHp,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
