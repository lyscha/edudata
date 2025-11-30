@extends('layout.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('murid.update', $murid->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold mb-0">Edit Data Murid</h5>
                    <a href="{{ route('murid.index') }}" class="btn btn-sm btn-outline-info">Kembali</a>
                </div>

                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">NISN</label>
                        <input type="number" name="nisn" class="form-control" value="{{ $murid->nisn }}">
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ $murid->nama }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas_id" class="form-select">
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ $murid->kelas_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki" {{ $murid->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $murid->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $murid->no_hp }}">
                    </div>
                </div>

                <button class="btn btn-primary w-100 btn-sm" type="submit">Update</button>

            </form>

        </div>
    </div>
</div>

@endsection
