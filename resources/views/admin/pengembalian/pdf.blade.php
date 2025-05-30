<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian Perangkat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>

    <h2>Laporan Pengembalian Perangkat SMKN 69 Jakarta</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Perangkat</th>
                <th>Kelas</th>
                <th>Jumlah Perangkat</th>
                <th>Status Pengembalian</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalian as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->peminjaman->nama_perangkat ?? 'N/A' }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->jumlah_perangkat }}</td>
                <td>{{ ucfirst($item->status_pengembalian) }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
