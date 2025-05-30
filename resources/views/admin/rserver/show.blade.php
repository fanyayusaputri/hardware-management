@extends('layouts.admin')

@section('page-title', 'Detail Perangkat')
@section('breadcrumb', 'Detail Perangkat')

@section('main')

<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Perangkat: {{ $perangkat->nama }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($perangkat->gambar)
                        <img src="{{ Str::startsWith($perangkat->gambar, 'assets/') 
                              ? asset($perangkat->gambar) 
                              : asset('storage/' . $perangkat->gambar) }}" 
                              alt="{{ $perangkat->nama }}" class="img-fluid" width="200">
                    
                        @else
                            <p>No image available</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Perangkat</label>
                        <p>{{ $perangkat->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <p>{{ $perangkat->deskripsi }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <p>{{ $perangkat->lokasi }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <p>{{ $perangkat->stok }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <p>
                            <span class="badge bg-{{ $perangkat->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($perangkat->status) }}
                            </span>
                        </p>
                    </div>

                    <a href="{{ route('admin.rserver.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('css')
<style>
    /* Menata ulang elemen gambar */
    .img-fluid {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    /* Styling card */
    .card {
        border: 1px solid #ddd;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    /* Memperbaiki padding dan margin form label dan value */
    .form-label {
        font-weight: bold;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    /* Styling status badge */
    .badge {
        font-size: 0.875rem;
        padding: 0.5rem;
    }

    /* Button styling */
    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

@endsection
