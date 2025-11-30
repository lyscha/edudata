@extends('layout.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('murid.store') }}" method="POST">
                @csrf

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold mb-0">Tambahkan Data Murid</h5>
                    <a href="{{ route('murid.index') }}" class="btn btn-sm btn-outline-info">Kembali</a>
                </div>

               <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control">
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas_id" class="form-select">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary w-100 btn-sm" type="submit">Simpan</button>
            </form>

        </div>
    </div>
</div>

@endsection
