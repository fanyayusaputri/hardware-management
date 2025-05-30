@extends('layouts.admin')

@section('page-title', 'Edit Pengembalian')
@section('breadcrumb', 'Edit Pengembalian')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pengembalian</h4>
                    <form action="{{ route('admin.pengembalian.update', $pengembalian->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama_perangkat">Nama Perangkat</label>
                            <input type="text" name="nama_perangkat" id="nama_perangkat" class="form-control" 
                                value="{{ $pengembalian->peminjaman->nama_perangkat ?? old('nama_perangkat') }}" 
                                required>
                        </div>
                        
                        <div class="form-group">
                            <label for="jumlah_perangkat">Jumlah Perangkat</label>
                            <input type="number" name="jumlah_perangkat" id="jumlah_perangkat" class="form-control" 
                                value="{{ $pengembalian->jumlah_perangkat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status_pengembalian">Status Pengembalian</label>
                            <select name="status_pengembalian" id="status_pengembalian" class="form-control" required>
                                <option value="belum_dikembalikan" 
                                    {{ $pengembalian->status_pengembalian == 'belum_dikembalikan' ? 'selected' : '' }}>
                                    Belum Dikembalikan
                                </option>
                                <option value="sudah_dikembalikan" 
                                    {{ $pengembalian->status_pengembalian == 'sudah_dikembalikan' ? 'selected' : '' }}>
                                    Sudah Dikembalikan
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
