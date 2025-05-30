@extends('siswa.dashboard')

@section('title', 'Form Pengembalian Perangkat')

@section('content')
<style>
    .center-card {
        max-width: 600px;
        width: 100%;
    }
    .container-test {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 50px;
    }
</style>

<div class="container-test d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-top: 50px;">
    <div class="card shadow-lg center-card">
        <div class="card-body">
            <h3 class="text-center mb-4">Form Pengembalian Perangkat</h3>
            <form action="{{ route('pengembalian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->name }}" required readonly>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required readonly>
                </div>

                <div class="mb-3">
                    <label for="peminjaman_id" class="form-label">Pilih Perangkat</label>
                    <select class="form-control" id="peminjaman_id" name="peminjaman_id" required>
                        @forelse($peminjaman as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_perangkat }}</option>
                        @empty
                            <option disabled>Tidak ada perangkat tersedia</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_perangkat" class="form-label">Jumlah Perangkat</label>
                    <input type="number" class="form-control" id="jumlah_perangkat" name="jumlah_perangkat" 
                        value="{{ $jumlahPerangkat }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="datetime-local" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                </div>

                <div class="mb-3">
                    <label for="status_pengembalian" class="form-label">Status Pengembalian</label>
                    <select class="form-control" id="status_pengembalian" name="status_pengembalian">
                        <option value="belum_dikembalikan">Belum Dikembalikan</option>
                        <option value="sudah_dikembalikan">Sudah Dikembalikan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bukti_pengembalian" class="form-label">Bukti Pengembalian (upload jika sudah dikembalikan)</label>
                    <input type="file" class="form-control" id="bukti_pengembalian" name="bukti_pengembalian" accept="image/*">
                </div>

                <div class="mb-3" id="alasanContainer" style="display: none;">
                    <label for="alasan_belum_dikembalikan" class="form-label">Alasan Belum Dikembalikan</label>
                    <textarea class="form-control" id="alasan_belum_dikembalikan" name="alasan_belum_dikembalikan" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('status_pengembalian').addEventListener('change', function () {
        var alasanContainer = document.getElementById('alasanContainer');
        var alasanInput = document.getElementById('alasan_belum_dikembalikan');

        if (this.value === 'belum_dikembalikan') {
            alasanContainer.style.display = 'block';
            alasanInput.value = '';
        } else {
            alasanContainer.style.display = 'none';
            alasanInput.value = 'Sudah dikembalikan';
        }
    });
</script>

@endsection
