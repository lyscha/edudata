@extends('layout/app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Murid
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahMurid }}
                            </div>                        
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Kelas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahKelas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Murid Laki-Laki
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalLaki }}
                            </div>                        
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Murid Perempuan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ $totalPerempuan }}
                            </div>                        
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="col-lg-12 mb-5">
        <canvas id="chartSiswa" width="100%" height="30"></canvas>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-muted text-center">Nama Murid</th>
                                <th class="text-muted text-center">Kelas</th>
                                <th class="text-muted text-center">Jenis Kelamin</th>
                                <th class="text-muted text-center">Nomor Telepon</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($murid as $m)
                                @php
                                    $user = $m->user;
                                    $foto = $user?->profile_picture
                                        ? asset('profile_pictures/' . $user->profile_picture)
                                        : asset('/BS/assets/images/profile/avatar.jpeg');
                                @endphp

                                <tr>
                                    <td class="p-0">
                                        <div class="d-flex justify-content-end">
                                            <img src="{{ $foto }}" class="rounded-circle" style="object-fit: cover;" width="40" height="40" alt="{{ $m->nama }}" />
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-inline-flex align-items-center">
                                            <div class="ms-3 text-start">
                                                <h6 class="mb-0 fw-bolder">{{ $m->nama }}</h6>
                                                <span class="text-muted">{{ $m?->nisn ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        {{ $m->kelas?->nama_kelas ?? '-' }}
                                    </td>

                                    <td class="text-center">{{ $m->jenis_kelamin }}</td>

                                    <td class="text-center">{{ $m->no_hp }}</td>
                                </tr>
                            @endforeach
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
</div>

@endsection
