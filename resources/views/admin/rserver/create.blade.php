@extends('layouts.admin')

@section('page-title', 'Tambah Perangkat')
@section('breadcrumb', 'Tambah Perangkat')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Perangkat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.rserver.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Perangkat</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required list="lokasi-options">
                            <datalist id="lokasi-options">
                                <option value="RUANG SERVER">
                                <!-- Tambahkan lebih banyak opsi jika diperlukan -->
                            </datalist>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
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
