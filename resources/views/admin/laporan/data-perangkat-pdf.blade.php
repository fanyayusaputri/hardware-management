<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Perangkat</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .badge {
            padding: 5px;
            font-size: 12px;
            border-radius: 5px;
            color: white;
        }
        .bg-success { background-color: green; }
        .bg-danger { background-color: red; }
    </style>
</head>
<body>
    <h1>Laporan Data Perangkat SMKN 69 JAKARTA</h1>

    <!-- Data Perangkat Server -->
    <h5>Data Perangkat Server</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perangkats_server as $index => $perangkat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                 <img src="{{ storage_path('app/public/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">

                </td>
                <td>{{ $perangkat->nama }}</td>
                <td>{{ $perangkat->stok }}</td>
                <td>
                    <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                        {{ $perangkat->status }}
                    </span>
                </td>
                <td>{{ $perangkat->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Data Perangkat Lab SIJA 1 -->
    <h5>Data Perangkat Lab SIJA 1</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Serial Number</th>
                <th>Merek</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perangkats_lab1 as $index => $perangkat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                 <img src="{{ storage_path('app/public/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">

                </td>
                <td>{{ $perangkat->nama }}</td>
                <td>{{ $perangkat->sn }}</td>
                <td>{{ $perangkat->merek }}</td>
                <td>{{ $perangkat->stok }}</td>
                <td>
                    <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                        {{ $perangkat->status }}
                    </span>
                </td>
                <td>{{ $perangkat->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Data Perangkat Lab SIJA 2 -->
    <h5>Data Perangkat Lab SIJA 2</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Serial Number</th>
                <th>Merek</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perangkats_lab2 as $index => $perangkat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                 <img src="{{ storage_path('app/public/' . $perangkat->gambar) }}" alt="{{ $perangkat->nama }}" width="150">

                </td>
                <td>{{ $perangkat->nama }}</td>
                <td>{{ $perangkat->sn }}</td>
                <td>{{ $perangkat->merek }}</td>
                <td>{{ $perangkat->stok }}</td>
                <td>
                    <span class="badge bg-{{ $perangkat->status == 'Available' ? 'success' : 'danger' }}">
                        {{ $perangkat->status }}
                    </span>
                </td>
                <td>{{ $perangkat->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
