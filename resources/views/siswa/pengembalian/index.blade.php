@extends('siswa.dashboard')

@section('title', 'Daftar Pengembalian')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Daftar Pengembalian Perangkat</h1>

    <div class="table-responsive">
        <table class="table table-bordered custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="d-none d-md-table-cell">Kelas</th>
                    <th>Nama Perangkat</th>
                    <th class="d-none d-md-table-cell">Jumlah</th>
                    <th>Status</th>
                    <th class="d-none d-md-table-cell">Tanggal</th>
                    <th>Bukti</th>
                    <th class="d-none d-md-table-cell">Alasan</th>
                </tr>
            </thead>
            <tbody>
                @if($pengembalian->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada history pengembalian</td>
                    </tr>
                @else
                    @foreach($pengembalian as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->kelas }}</td>
                        <td>{{ $item->peminjaman->nama_perangkat ?? 'N/A' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->jumlah_perangkat }}</td>
                        <td>{{ ucfirst($item->status_pengembalian) }}</td>
                        <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y H:i') }}</td>
                        <td>
                            @if($item->bukti_pengembalian)
                                <a href="{{ asset('storage/' . $item->bukti_pengembalian) }}" target="_blank">Lihat</a>
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">{{ $item->alasan_belum_dikembalikan ?? '-' }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .custom-table thead {
        background-color: #23A2F6;
        color: white;
        text-align: center;
    }

    .custom-table th, .custom-table td {
        padding: 10px;
        text-align: center;
    }

    .custom-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .custom-table {
        border-radius: 10px;
        overflow: hidden;
    }

    /* Responsif */
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
