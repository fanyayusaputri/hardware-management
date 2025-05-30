@extends('siswa.dashboard')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Daftar Peminjaman Perangkat</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="d-none d-md-table-cell">Kelas</th>
                    <th>No Telepon</th>
                    <th>Nama Perangkat</th>
                    <th class="d-none d-md-table-cell">Jumlah</th>
                    <th>Status</th>
                    <th class="d-none d-md-table-cell">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjaman->nama }}</td>
                        <td class="d-none d-md-table-cell">{{ $peminjaman->kelas }}</td>
                        <td>{{ $peminjaman->no_telepon }}</td>
                        <td>{{ $peminjaman->nama_perangkat }}</td>
                        <td class="d-none d-md-table-cell">{{ $peminjaman->jumlah_perangkat }}</td>
                        <td>{{ $peminjaman->persetujuan }}</td>
                        <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data peminjaman</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .custom-table {
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-table thead {
        background-color: #FF9D3D;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .custom-table tbody tr:hover {
        background-color: #ffe0b3;
        transition: background-color 0.3s ease-in-out;
    }

    .custom-table th, .custom-table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .custom-table td {
        background-color: #fff;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .custom-table {
            font-size: 14px;
        }
        .custom-table th, .custom-table td {
            padding: 8px;
        }
    }

    @media (max-width: 576px) {
        .custom-table {
            font-size: 12px;
        }
        .custom-table th, .custom-table td {
            padding: 6px;
        }
    }
</style>
@endsection
