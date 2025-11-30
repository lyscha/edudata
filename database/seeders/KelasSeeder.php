<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            ['nama_kelas' => 'X RPL Traspac',     'wali_kelas' => 'Bu Sinta'],
            ['nama_kelas' => 'XI RPL Traspac',    'wali_kelas' => 'Pak Deni'],
            ['nama_kelas' => 'XII RPL Traspac',   'wali_kelas' => 'Bu Aulia'],
            ['nama_kelas' => 'X TEI Panasonic',   'wali_kelas' => 'Pak Raka'],
            ['nama_kelas' => 'XI TEI Panasonic',  'wali_kelas' => 'Bu Nida'],
            ['nama_kelas' => 'XII TEI Panasonic', 'wali_kelas' => 'Pak Hendri'],
            ['nama_kelas' => 'X TO Yamaha',       'wali_kelas' => 'Bu Lilis'],
            ['nama_kelas' => 'XI TO Yamaha',      'wali_kelas' => 'Pak Bagas'],
            ['nama_kelas' => 'XII TO Yamaha',     'wali_kelas' => 'Bu Desi'],
        ];

        foreach ($kelas as $k) {
            DB::table('kelas')->insert([
                'nama_kelas' => $k['nama_kelas'],
                'wali_kelas' => $k['wali_kelas'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
