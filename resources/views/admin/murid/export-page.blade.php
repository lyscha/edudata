@extends('layout.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold">Export Data Murid</h4>
                <a href="{{ route('murid.index') }}" class="btn btn-sm btn-outline-info">Kembali</a>
            </div>

            <p class="text-muted">Klik tombol di bawah untuk download file Excel data murid.</p>

            <a href="{{ route('murid.export') }}" class="btn btn-warning">
                Download Excel
            </a>

        </div>
    </div>
</div>

@endsection
