<!DOCTYPE html>
<html>
<head>
    <title>Peringatan Tenggat Pengembalian</title>
</head>
<body>
<p>Terima kasih telah mengajukan peminjaman perangkat.</p>

    <p>Halo {{ $peminjaman->nama }},</p>

    <p>Ini adalah pengingat bahwa perangkat <strong>{{ $peminjaman->nama_perangkat }}</strong> yang kamu pinjam harus dikembalikan pada tanggal <strong>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d M Y H:i') }}</strong>.</p>

    <p>Mohon pastikan untuk mengembalikannya tepat waktu.</p>

    <p>Berikut detail peminjaman Anda:</p>
    <ul>
        <li><strong>Nama Perangkat:</strong> {{ $peminjaman->nama_perangkat }}</li>
        <li><strong>Jumlah:</strong> {{ $peminjaman->jumlah_perangkat }}</li>
        <li><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</li>
        <li><strong>Tanggal Pengembalian:</strong> {{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('Y-m-d H:i:s') }}</li>

    </ul>

    <p>Mohon pastikan perangkat dikembalikan tepat waktu. Terima kasih.</p>

    <p>Terima kasih.</p>
</body>
</html>
