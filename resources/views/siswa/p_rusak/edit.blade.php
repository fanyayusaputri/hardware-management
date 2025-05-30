@extends('layouts.admin')

@section('page-title', 'Edit Data Perangkat Rusak')
@section('breadcrumb', 'Edit Data Perangkat Rusak')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('perangkat-rusak.update', $perangkatRusak->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $perangkatRusak->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label>Perangkat</label>
                            <input type="text" name="perangkat" class="form-control" value="{{ $perangkatRusak->perangkat }}" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required>{{ $perangkatRusak->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Ajukan</label>
                            <input type="date" name="tanggal_ajukan" class="form-control" value="{{ $perangkatRusak->tanggal_ajukan }}" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="DI PERIKSA" {{ $perangkatRusak->status == 'DI PERIKSA' ? 'selected' : '' }}>DI PERIKSA</option>
                                <option value="DI PERBAIKI" {{ $perangkatRusak->status == 'DI PERBAIKI' ? 'selected' : '' }}>DI PERBAIKI</option>
                                <option value="SELESAI DI PERBAIKI" {{ $perangkatRusak->status == 'SELESAI DI PERBAIKI' ? 'selected' : '' }}>SELESAI DI PERBAIKI</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.rusak') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
