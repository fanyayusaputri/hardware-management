@extends('layouts.admin')

@section('page-title', 'Lab Sija 2')
@section('breadcrumb', 'Lab Sija 2')

@php
use Illuminate\Support\Str;
@endphp

@section('main')
<section class="section dashboard">
    <div class="row">
        <br>
        <div class="col-md-12">
            <!-- Tombol Tambah perangkatlab2 -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.lab_sija_2.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Perangkat
                </a>
            </div>
            <br>

            <!-- Tabel -->
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th> <!-- Kolom No -->
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Serial Number</th>
                        <th>Merek</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perangkatlab2s as $index => $perangkatlab2) <!-- Menambahkan index -->
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                            <td>
                            <img src="{{ Str::startsWith($perangkatlab2->gambar, 'assets/') 
                              ? asset($perangkatlab2->gambar) 
                              : asset('storage/' . $perangkatlab2->gambar) }}" 
                              alt="{{ $perangkatlab2->nama }}" width="150">
                            </td>
                            <td>{{ $perangkatlab2->nama }}</td>
                            <td>{{ $perangkatlab2->sn }}</td>
                            <td>{{ $perangkatlab2->merek }}</td>
                            <td>{{ $perangkatlab2->stok }}</td>
                            <td>
                                <span class="badge bg-{{ $perangkatlab2->status == 'Available' ? 'success' : 'danger' }}">
                                    {{ $perangkatlab2->status }}
                                </span>
                            </td>
                            <td>{{ $perangkatlab2->lokasi }}</td>
                            <td>
                            <!-- Lihat Detail -->
                            <a href="{{ route('admin.lab_sija_2.show', $perangkatlab2->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.lab_sija_2.edit', $perangkatlab2->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Hapus -->
                            <form action="{{ route('admin.lab_sija_2.destroy', $perangkatlab2->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus perangkat ini?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@section('css')
<style>
    /* Styling tombol "Tambah perangkatlab2" */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Styling tabel */
    table.table {
        margin-top: 15px;
        background-color: #ffffff;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    table.table thead {
        background-color: #343a40;
        color: #ffffff;
    }

    table.table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    table.table tbody tr:nth-child(even) {
        background-color: #e9ecef;
    }

    table.table th, table.table td {
        padding: 10px;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    /* Badge styling */
    .badge {
        padding: 5px 10px;
        font-size: 14px;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
    }
</style>
@endsection



@section('js')
@endsection

@section('script')
<script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                    ]
                  }]
                });
              });
            </script>
@endsection
