@extends('siswa.dashboard')

@section('title', 'Form Peminjaman Perangkat')

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
    padding-top: 50px; /* Gunakan padding daripada margin */
}
</style>
<div class="container-test d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-top: 50px;">
    <div class="card shadow-lg center-card">
        <div class="card-body">
            <h3 class="text-center mb-4">Form Peminjaman Perangkat</h3>
            <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nama" class="form-label">Nama Peminjam</label>
           
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->name }}" required readonly>

        </div>
        <div class="col-md-6 mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required readonly>

        </div>
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required readonly>
</div>

    <div class="mb-3">
        <label for="no_telepon" class="form-label">No. Telepon</label>
        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
    </div>

    <div class="mb-3">
        <label for="nama_perangkat" class="form-label">Nama Perangkat</label>
        <input type="text" class="form-control" id="nama_perangkat" name="nama_perangkat" readonly>
    </div>

    <div class="mb-3">
        <label for="jumlah_perangkat" class="form-label">Jumlah Perangkat</label>
        <input type="number" class="form-control" id="jumlah_perangkat" name="jumlah_perangkat" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_peminjaman" class="form-label">Tanggal dan Waktu Peminjaman</label>
        <input type="datetime-local" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
    </div>
    <div class="mb-3">
    <label for="tanggal_tenggat" class="form-label">Tenggat Pengembalian</label>
    <input type="datetime-local" class="form-control" id="tanggal_tenggat" name="tanggal_tenggat" readonly>
</div>

<div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="tanggung_jawab" name="tanggung_jawab" required>
        <label class="form-check-label" for="tanggung_jawab">
            Saya Bertanggung Jawab Atas Kehilangan atau Kerusakan Perangkat
        </label>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
    </div>
</form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Validasi input nomor telepon hanya angka
        $('#no_telepon').on('input', function () {
            let value = $(this).val();
            if (!/^\d*$/.test(value)) {
                alert('Nomor telepon hanya boleh berisi angka!');
                $(this).val(value.replace(/\D/g, '')); // Hapus karakter non-angka
            }
        });

        // Ambil nama perangkat dari URL jika ada
        const urlParams = new URLSearchParams(window.location.search);
        const namaPerangkat = urlParams.get('nama_perangkat');
     
        if (namaPerangkat) {
            $('#nama_perangkat').val(namaPerangkat);
        }
       
        // Ambil data perangkat dari server
        $.ajax({
            url: "{{ route('get.perangkat') }}",
            type: "GET",
            success: function (data) {
                let perangkatDropdown = $('#id');
                perangkatDropdown.append('<option value="">-- Pilih Perangkat --</option>');
                data.forEach(function (perangkat) {
                    perangkatDropdown.append(`<option value="${perangkat.id}" data-nama="${perangkat.nama}">${perangkat.nama}</option>`);
                });

                // Jika ID dari URL ada, pilih otomatis
                if (idPerangkat) {
                    perangkatDropdown.val(idPerangkat);
                }
            }
        });

        // Saat memilih perangkat, otomatis isi nama perangkat
        $('#id').change(function () {
            let namaPerangkat = $(this).find(':selected').data('nama');
            $('#nama_perangkat').val(namaPerangkat);
        });

        //tenggat
      // Hitung tenggat peminjaman (3 hari dari tanggal peminjaman)
        $('#tanggal_peminjaman').on('change', function () {
            const tanggalPinjam = new Date($(this).val());
            if (!isNaN(tanggalPinjam.getTime())) {
                const tenggat = new Date(tanggalPinjam);
                tenggat.setDate(tenggat.getDate() + 3); // Ganti 7 ke 3

                const pad = (n) => (n < 10 ? '0' + n : n);
                const formatted = `${tenggat.getFullYear()}-${pad(tenggat.getMonth() + 1)}-${pad(tenggat.getDate())}T${pad(tenggat.getHours())}:${pad(tenggat.getMinutes())}`;

                $('#tanggal_tenggat').val(formatted);
            }
        });

    });
</script>


@endsection
