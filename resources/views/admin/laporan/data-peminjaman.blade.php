@extends('layouts.admin')

@section('page-title', 'Data Peminjaman Perangkat SMKN 69 JAKARTA')
@section('breadcrumb', 'Data Peminjaman Perangkat SMKN 69 JAKARTA')

@section('main')
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Peminjaman</h4>
                    <div>
                        <a href="{{ route('admin.peminjaman.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
                        <a href="{{ route('admin.peminjaman.export.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form Filter -->
                    <form action="{{ route('admin.laporan.data-peminjaman') }}" method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel Data Peminjaman -->
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>No Telepon</th>
                                <th>Nama Perangkat</th>
                                <th>Jumlah Perangkat</th>
                                <th>Status</th>
                                <th>Tanggal Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->nama }}</td>
                                    <td>{{ $peminjaman->kelas }}</td>
                                    <td>{{ $peminjaman->no_telepon }}</td>
                                    <td>{{ $peminjaman->nama_perangkat }}</td>
                                    <td>{{ $peminjaman->jumlah_perangkat }}</td>
                                    <td>{{ $peminjaman->persetujuan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d-m-Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    .table {
        margin-top: 15px;
        background-color: #fff;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table tbody tr:nth-child(even) {
        background-color: #e9ecef;
    }

    .table th, .table td {
        padding: 10px;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
    }
    .btn-primary{
        margin-top: 20px;
    }


    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>
@endsection
