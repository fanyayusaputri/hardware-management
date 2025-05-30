@extends('layouts.admin')

@section('page-title', 'Edit Status Peminjaman')
@section('breadcrumb', 'Edit Status Peminjaman')

@section('main')
<section class="section dashboard">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Edit Status Peminjaman
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Peminjam</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->nama }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="status">Status Peminjaman</label>
                            <select name="persetujuan" id="status" class="form-control" required>
                                <option value="Pending" {{ $peminjaman->persetujuan == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Disetujui" {{ $peminjaman->persetujuan == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="Ditolak" {{ $peminjaman->persetujuan == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    /* Style untuk card agar lebih besar dan menarik */
    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-header {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 25px;
    }

    /* Form Style */
    .form-group {
        margin-bottom: 20px; /* Tambahkan jarak antar form-group */
    }

    .form-group label {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 8px; /* Jarak antara label dan input */
        display: block; /* Pastikan label ada di atas input */
    }

    .form-control {
        height: 50px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px; /* Tambahkan padding agar teks dalam input tidak terlalu mepet */
    }

    select.form-control {
        cursor: pointer;
    }

    /* Button Style */
    .btn-success, .btn-secondary {
        font-size: 16px;
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 8px;
        margin-top: 10px; /* Tambahkan sedikit jarak antara tombol dan form */
    }

    .btn-success:hover {
        background-color: #28a745;
        box-shadow: 0px 4px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-secondary:hover {
        background-color: #6c757d;
        box-shadow: 0px 4px 8px rgba(108, 117, 125, 0.3);
    }
</style>
@endsection
