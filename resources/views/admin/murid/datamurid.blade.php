@extends('layout.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Murid</h5>

                <div class="d-flex gap-2">
                    <a href="{{ route('murid.create') }}" class="btn btn-sm btn-outline-primary">Tambah Murid</a>

                    <a href="{{ route('murid.importPage') }}" class="btn btn-sm btn-outline-success">
                        Import Data Excel
                    </a>

                    <a href="{{ route('murid.exportPage') }}" class="btn btn-sm btn-outline-warning">
                        Export Ke Excel
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <form method="GET" action="{{ route('murid.index') }}" class="mb-3">
                    <div class="row g-2">

                        <div class="col-md-4">
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control" 
                                placeholder="Cari nama / NISN..." 
                                value="{{ request('search') }}"
                            >
                        </div>

                        <div class="col-md-3">
                            <select name="kelas" class="form-select">
                                <option value="">-- Filter Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="jk" class="form-select">
                                <option value="">-- Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ request('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ request('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Filter</button>
                        </div>

                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($murid as $m)
                        <tr>
                            <td class="text-center">{{ $m->nisn }}</td>
                            <td class="text-center">{{ $m->nama }}</td>
                            <td class="text-center">{{ $m->kelas->nama_kelas ?? '-' }}</td>
                            <td class="text-center">{{ $m->kelas->wali_kelas ?? '-' }}</td>
                            <td class="text-center">{{ $m->jenis_kelamin }}</td>
                            <td class="text-center">{{ $m->no_hp }}</td>

                            <td class="text-center">
                                <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                                <button 
                                    type="button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalDelete{{ $m->id }}" 
                                    class="btn btn-danger btn-sm mb-1">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        @include('admin.murid.modal', ['m' => $m])

                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
                <div class="mt-3">
                    <div>
                        {{ $murid->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
