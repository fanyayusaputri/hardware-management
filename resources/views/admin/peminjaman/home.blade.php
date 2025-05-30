@extends('layouts.admin')

@section('page-title', 'Status Peminjaman')
@section('breadcrumb', 'Status Peminjaman')

@section('main')
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <br>

            <!-- Tabel -->
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No Telepon</th>
                        <th>Nama Perangkat</th>
                        <th>Jumlah Perangkat</th>
                        <th>Status</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamans as $peminjaman)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peminjaman->nama }}</td>
                            <td>{{ $peminjaman->kelas }}</td> <!-- Tambahan kolom Kelas -->
                            <td>{{ $peminjaman->no_telepon }}</td>
                            <td>{{ $peminjaman->nama_perangkat }}</td>
                            <td>{{ $peminjaman->jumlah_perangkat }}</td>
                            <td>{{ $peminjaman->persetujuan }}</td>
                            <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d-m-Y H:i') }}</td>
                            <td>
                                <!-- Show Button -->
                                                             <!-- Edit Button -->
                               <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}" class="text-warning mx-1">
                                  <i class="fas fa-edit"></i> Edit
                               </a>

                                
                                <!-- Delete Button -->
                                <a href="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" 
   class="text-danger mx-1" 
   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $peminjaman->id }}').submit();">
   <i class="fas fa-trash-alt"></i> Hapus
</a>

<form id="delete-form-{{ $peminjaman->id }}" action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
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
    .table {
        margin-top: 15px;
        background-color: #fff;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    .table thead {
        background-color: #343a40;
        color: #ffffff;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table tbody tr:nth-child(even) {
        background-color: #e9ecef;
    }

    .table th, .table td {
        padding: 10px;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endsection
