@extends('layouts.admin')

@section('page-title', 'Laporan Pengembalian Perangkat SMKN 69 JAKARTA')
@section('breadcrumb', 'Laporan Pengembalian Perangkat SMKN 69 JAKARTA')

@section('main')
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pengembalian</h4>
                    <div>
                        <a href="{{ route('admin.pengembalian.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
                        <a href="{{ route('admin.pengembalian.export.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form Filter -->
                    <form action="{{ route('admin.laporan.data-pengembalian') }}" method="GET" class="mb-3">
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

                    <!-- Tabel Data Pengembalian -->
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Nama Perangkat</th>
                                <th>Jumlah Perangkat</th>
                                <th>Status Pengembalian</th>
                                <th>Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengembalian as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->peminjaman->nama_perangkat ?? 'N/A' }}</td>
                                    <td>{{ $item->jumlah_perangkat }}</td>
                                    <td>{{ ucfirst($item->status_pengembalian) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y H:i') }}</td>
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

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-primary{
        margin-top: 20px;
    }

</style>
@endsection
