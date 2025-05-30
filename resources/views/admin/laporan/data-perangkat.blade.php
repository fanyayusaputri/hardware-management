@extends('layouts.admin')

@section('page-title', 'Laporan Data Perangkat SMKN 69 JAKARTA')
@section('breadcrumb', 'Laporan Data Perangkat SMKN 69 JAKARTA')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Perangkat</h4>
                    <div>
                        <a href="{{ route('admin.laporan.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
                        <a href="{{ route('admin.laporan.export.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.laporan.data-perangkat') }}" class="mb-3">
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
                    <!-- Data Perangkat Server -->
                    <h5>Data Perangkat Server</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perangkats_server as $index => $perangkat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">
                                    </td>
                                    <td>{{ $perangkat->nama }}</td>
                                    <td>{{ $perangkat->stok }}</td>
                                    <td>
                                        <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                                            {{ $perangkat->status }}
                                        </span>
                                    </td>
                                    <td>{{ $perangkat->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Data Perangkat Lab SIJA 1 -->
                    <h5>Data Perangkat Lab SIJA 1</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Serial Number</th>
                                <th>Merek</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perangkats_lab1 as $index => $perangkat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">
                                    </td>
                                    <td>{{ $perangkat->nama }}</td>
                                    <td>{{ $perangkat->sn }}</td>
                                    <td>{{ $perangkat->merek }}</td>
                                    <td>{{ $perangkat->stok }}</td>
                                    <td>
                                        <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                                            {{ $perangkat->status }}
                                        </span>
                                    </td>
                                    <td>{{ $perangkat->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Data Perangkat Lab SIJA 2 -->
                    <h5>Data Perangkat Lab SIJA 2</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Serial Number</th>
                                <th>Merek</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perangkats_lab2 as $index => $perangkat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">
                                    </td>
                                    <td>{{ $perangkat->nama }}</td>
                                    <td>{{ $perangkat->sn }}</td>
                                    <td>{{ $perangkat->merek }}</td>
                                    <td>{{ $perangkat->stok }}</td>
                                    <td>
                                        <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                                            {{ $perangkat->status }}
                                        </span>
                                    </td>
                                    <td>{{ $perangkat->lokasi }}</td>
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
        margin-top: 20px;
        border: 1px solid #ddd; /* Border around the table */
        border-collapse: collapse; /* Ensures borders are not doubled */
    }

    .btn-primary{
        margin-top: 20px;
    }

    .table th, .table td {
        border: 1px solid #ddd; /* Border around table cells */
        padding: 8px; /* Adds padding inside the cells */
        text-align: left; /* Aligns text to the left */
    }

    .table th {
        background-color: #f4f4f4; /* Light background for table headers */
    }

    .btn-sm {
        margin-right: 5px;
    }
</style>
@endsection
