<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMurid = Murid::count();
        $jumlahKelas = Kelas::count();

        $totalLaki = Murid::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Murid::where('jenis_kelamin', 'Perempuan')->count();

        $kelas = Kelas::withCount('murid')->get();
        $labels = $kelas->pluck('nama_kelas');
        $data = $kelas->pluck('murid_count');

        $murid = Murid::latest()->paginate(10);

        return view('dashboard', compact(
            'jumlahMurid',
            'jumlahKelas',
            'totalLaki',
            'totalPerempuan',
            'labels',
            'data',
            'murid'
        ));
    }
}
