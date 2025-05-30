<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Perangkat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Perangkat SMKN 69 JAKARTA</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No Telepon</th>
                <th>Nama Perangkat</th>
                <th>Jumlah Perangkat</th>
                <th>Status</th>
                <th>Tanggal Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $key => $peminjaman)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $peminjaman->nama }}</td>
                    <td>{{ $peminjaman->kelas }}</td>
                    <td>{{ $peminjaman->no_telepon }}</td>
                    <td>{{ $peminjaman->nama_perangkat }}</td>
                    <td>{{ $peminjaman->jumlah_perangkat }}</td>
                    <td>{{ $peminjaman->persetujuan }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
