@extends('siswa.dashboard')

@section('title', 'Form Pengajuan Perangkat Rusak')

@section('content')
<div class="container-test d-flex justify-content-center">
    <div class="card shadow-lg p-4 center-card">
        <h2 class="text-center mb-4">Ajukan Kerusakan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('ajukan-kerusakan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama Pengaju</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Perangkat</label>
                <input type="text" name="perangkat" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Deskripsi Kerusakan</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Tanggal Pengajuan</label>
                <input type="date" name="tanggal_ajukan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Bukti Kerusakan</label>
                <input type="file" name="bukti_kerusakan" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
        </form>
    </div>
</div>

<style>
    .container-test {
        margin-top: 80px; /* Menurunkan form agar tidak tertutup navbar */
    }
    .center-card {
        max-width: 600px;
        width: 100%;
        background: #fff;
        border-radius: 10px;
    }
</style>
@endsection
