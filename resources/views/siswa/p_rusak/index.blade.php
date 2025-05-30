@extends('siswa.dashboard')

@section('title', 'Perangkat Rusak')

@section('content')
@php use Illuminate\Support\Str; @endphp
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
                    <div class="table-responsive">
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perangkatRusak as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->perangkat }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_ajukan)->format('d-m-Y') }}</td>
                                        <td>
                                            <span style="color: 
                                                {{ $data->status == 'DI PERIKSA' ? 'orange' : 
                                                   ($data->status == 'DI PERBAIKI' ? 'blue' : 'green') }}; 
                                                font-weight: bold;">
                                                {{ $data->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($data->bukti_kerusakan)
                                                <!-- Tombol Lihat Bukti -->
                                                <a href="#" class="lihat-bukti" data-toggle="modal" data-target="#modalBukti{{ $key }}">
                                                    Lihat Bukti
                                                </a>

                                                <!-- Modal Bootstrap -->
                                                <div class="modal fade" id="modalBukti{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $key }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel{{ $key }}">Bukti Kerusakan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                            @php
                                                                $buktiUrl = Str::startsWith($data->bukti_kerusakan, ['http://', 'https://', 'assets/'])
                                                                    ? asset($data->bukti_kerusakan)
                                                                    : asset('storage/' . $data->bukti_kerusakan);
                                                            @endphp
                                                            <img src="{{ $buktiUrl }}" class="img-fluid" alt="Bukti Kerusakan">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                Tidak ada bukti
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data perangkat rusak.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
