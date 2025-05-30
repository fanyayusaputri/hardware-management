<!DOCTYPE html>
<html>
<head>
    <title>Peringatan Tenggat Pengembalian</title>
</head>
<body>
    <p>Halo {{ $peminjaman->nama }},</p>

    <p>Ini adalah pengingat bahwa perangkat <strong>{{ $peminjaman->nama_perangkat }}</strong> yang kamu pinjam harus dikembalikan pada tanggal <strong>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d M Y H:i') }}</strong>.</p>

    <p>Mohon pastikan untuk mengembalikannya tepat waktu.</p>

    <p>Terima kasih.</p>
</body>
</html>
