@extends('layouts.admin')

@section('page-title', 'Edit Data Perangkat Rusak')
@section('breadcrumb', 'Edit Data Perangkat Rusak')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Perangkat Rusak</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('perangkat-rusak.update', $perangkatRusak->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $perangkatRusak->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Perangkat</label>
                            <input type="text" name="perangkat" class="form-control" value="{{ old('perangkat', $perangkatRusak->perangkat) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $perangkatRusak->deskripsi) }}</textarea>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Tanggal Ajukan</label>
                            <input type="date" name="tanggal_ajukan" class="form-control" value="{{ old('tanggal_ajukan', $perangkatRusak->tanggal_ajukan) }}" required>
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="DI PERIKSA" {{ $perangkatRusak->status == 'DI PERIKSA' ? 'selected' : '' }}>DI PERIKSA</option>
                                <option value="DI PERBAIKI" {{ $perangkatRusak->status == 'DI PERBAIKI' ? 'selected' : '' }}>DI PERBAIKI</option>
                                <option value="SELESAI" {{ $perangkatRusak->status == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Kerusakan (Opsional, jika ingin mengganti)</label>
                            <input type="file" name="bukti_kerusakan" class="form-control">
                            @if($perangkatRusak->bukti_kerusakan)
                                @php
                                    $previewPath = \Illuminate\Support\Str::startsWith($perangkatRusak->bukti_kerusakan, 'assets/')
                                        ? asset($perangkatRusak->bukti_kerusakan)
                                        : asset('storage/' . $perangkatRusak->bukti_kerusakan);
                                @endphp
                                <div class="mt-2">
                                    <a href="{{ $previewPath }}" target="_blank">
                                        <img src="{{ $previewPath }}" width="100">
                                    </a>
                                </div>
                            @endif
                        </div>


                        <div class="text-end">
                            <a href="{{ route('admin.rusak') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
