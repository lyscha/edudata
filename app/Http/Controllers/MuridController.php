<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Murid;
use App\Exports\MuridExport;
use App\Imports\MuridImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        $query = Murid::with('kelas');

        // Search by nama or NISN
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nisn', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kelas
        if ($request->kelas) {
            $query->where('kelas_id', $request->kelas);
        }

        // Filter jenis kelamin
        if ($request->jk) {
            $query->where('jenis_kelamin', $request->jk);
        }

        $murid = $query->paginate(10);   // pagination

        $kelas = Kelas::all(); // untuk dropdown kelas

        return view('admin.murid.datamurid', compact('murid', 'kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all(); // ga usah with wali_kelas kalo ga dipake
        return view('admin.murid.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|unique:users,username',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6',
            'nisn'          => 'required|unique:murid,nisn',
            'nama'          => 'required',
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'         => 'required',
        ]);

        // 1. buat user
        $user = \App\Models\User::create([
            'name'     => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'murid'
        ]);

        // 2. buat murid
        Murid::create([
            'user_id'       => $user->id,
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp'         => $request->no_hp
        ]);

        return redirect()->route('murid.index')->with('success', 'Murid berhasil ditambahkan.');
    }

    public function importPage()
    {
        return view('admin.murid.import-page');
    }

    public function exportPage()
    {
        return view('admin.murid.export-page');
    }

    public function export()
    {
        return Excel::download(new MuridExport, 'data_murid.xlsx');
    }


    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        $kelas = Kelas::with('wali_kelas')->get();
        return view('admin.murid.edit', compact('murid', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
        ]);

        Murid::findOrFail($id)->update($request->all());

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        // Hapus user
        if ($murid->user_id) {
            \App\Models\User::where('id', $murid->user_id)->delete();
        }

        // Hapus murid
        $murid->delete();

        return redirect()->route('murid.index')->with('success', 'Murid berhasil dihapus.');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new MuridImport, $request->file('file'));

            return back()->with('success', 'Import berhasil!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Import gagal! Pastikan semua data valid. Error: ' . $e->getMessage());
        }
    }
}
