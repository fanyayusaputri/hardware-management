@extends('layouts.admin')

@section('page-title', 'Data Perangkat SMKN 69 Jakarta')
@section('breadcrumb', 'Data Perangkat SMKN 69 Jakarta')


@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Perangkat Rusak</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Perangkat</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Ajukan</th>
                                <th>Status</th>
                                <th>Bukti Kerusakan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perangkatRusak as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->perangkat }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->tanggal_ajukan }}</td>
                                    <td>
                                        <span style="color: 
                                            {{ $data->status == 'DI PERIKSA' ? 'orange' : 
                                               ($data->status == 'DI PERBAIKI' ? 'blue' : 'green') }}; 
                                            font-weight: bold;">
                                            {{ $data->status }}
                                        </span>
                                    </td>
                                    <td>
                                    @php
                                        $path = \Illuminate\Support\Str::startsWith($data->bukti_kerusakan, 'assets/')
                                            ? asset($data->bukti_kerusakan)
                                            : asset('storage/' . $data->bukti_kerusakan);
                                    @endphp
                                    <button onclick="lihatBukti('{{ $path }}')" class="btn btn-primary btn-sm">
                                            Lihat Bukti
                                        </button>

                                    </td>
                                    <td>
                                        <a href="{{ route('perangkat-rusak.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('perangkat-rusak.destroy', $data->id) }}" method="POST" style="display:inline-block;" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data perangkat rusak.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function lihatBukti(url) {
        window.open(url, '_blank');
    }
</script>

@endsection
