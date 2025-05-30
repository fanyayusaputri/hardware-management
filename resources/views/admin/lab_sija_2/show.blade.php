@extends('layouts.admin')

@section('page-title', 'Detail Perangkat')
@section('breadcrumb', 'Detail Perangkat')
@php
use Illuminate\Support\Str;
@endphp

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Perangkat: {{ $perangkatlab2->nama }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($perangkatlab2->gambar)
                        <img src="{{ Str::startsWith($perangkatlab2->gambar, 'assets/') 
                              ? asset($perangkatlab2->gambar) 
                              : asset('storage/' . $perangkatlab2->gambar) }}" 
                              alt="{{ $perangkatlab2->nama }}" class="img-fluid" width="200">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Perangkat</label>
                        <p>{{ $perangkatlab2->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <p>{{ $perangkatlab2->deskripsi }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <p>{{ $perangkatlab2->lokasi }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <p>{{ $perangkatlab2->stok }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <p>
                            <span class="badge bg-{{ $perangkatlab2->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($perangkatlab2->status) }}
                            </span>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe perangkatlab2</label>
                        <p>{{ $perangkatlab2->tipe }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="sn" class="form-label">Serial Number (SN)</label>
                        <p>{{ $perangkatlab2->sn ?? 'Tidak tersedia' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek perangkatlab2</label>
                        <p>{{ $perangkatlab2->merek }}</p>
                    </div>

                    <a href="{{ route('admin.lab_sija_1.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .card {
        border: 1px solid #ddd;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    .form-label {
        font-weight: bold;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    .badge {
        font-size: 0.875rem;
        padding: 0.5rem;
    }

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
