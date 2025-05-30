<!DOCTYPE html>
<html>
<head>
    <title>Peringatan Tenggat Pengembalian H-1</title>
</head>
<body>

    <p>Halo {{ $peminjaman->nama }},</p>

    <h2>Pengingat Pengembalian Perangkat H-1 </h2>

    <p>Halo {{ $peminjaman->nama }},</p>
    <p>Ini adalah pengingat bahwa perangkat <strong>{{ $peminjaman->nama_perangkat }}</strong> yang Anda pinjam harus dikembalikan pada tanggal <strong>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d M Y H:i') }}</strong>.</p>

    <p>Mohon pastikan perangkat dikembalikan tepat waktu dalam kondisi baik.</p>

    <p>Terima kasih.</p>

</body>
</html>
