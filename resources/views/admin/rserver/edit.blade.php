@extends('layouts.admin')

@section('page-title', 'Edit Perangkat')
@section('breadcrumb', 'Edit Perangkat')

@php
use Illuminate\Support\Str;
@endphp

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Perangkat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.rserver.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Menandakan bahwa ini adalah form update -->

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <br>
                            @if($perangkat->gambar)
                               
                                <img src="{{ Str::startsWith($perangkat->gambar, 'assets/') 
                              ? asset($perangkat->gambar) 
                              : asset('storage/' . $perangkat->gambar) }}" 
                              alt="{{ $perangkat->nama }}" width="100" class="mt-2">

                                @endif

                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Perangkat</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $perangkat->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $perangkat->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $perangkat->lokasi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $perangkat->stok) }}" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="aktif" {{ old('status', $perangkat->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $perangkat->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.rserver.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
