@extends('layouts.admin')

@section('page-title', 'Data Laporan Siswa SMKN 69 Jakarta')
@section('breadcrumb', 'Data Laporan Siswa SMKN 69 Jakarta')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Siswa</h4>
                    <div>
                        <a href="{{ route('admin.siswa.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
                        <a href="{{ route('admin.siswa.export.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.laporan.data-siswa') }}" method="GET" class="mb-3">
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->kelas }}</td>
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
    }
    .btn-sm {
        margin-right: 5px;
    }
    .btn-primary{
        margin-top: 20px;
    }

</style>
@endsection
