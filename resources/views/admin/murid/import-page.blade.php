@extends('layout.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold">Import Data Murid</h4>
                <a href="{{ route('murid.index') }}" class="btn btn-sm btn-outline-info">Kembali</a>
            </div>

            <form action="{{ route('murid.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="form-label fw-bold">Upload File Excel</label>
                <input type="file" name="file" class="form-control mb-3" required>

                <small class="text-muted">
                    Format wajib: <span class="text-danger">username, email, password</span>, nisn, nama, kelas, jenis kelamin, no hp
                </small>

                <button class="btn btn-primary w-100 btn mt-3">Import</button>
            </form>

        </div>
    </div>
</div>

@endsection
