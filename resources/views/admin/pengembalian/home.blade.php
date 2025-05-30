@extends('layouts.admin')

@section('page-title', 'Status Pengembalian')
@section('breadcrumb', 'Status Pengembalian')

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
                    <th>Nama Perangkat</th>
                    <th>Kelas</th>
                    <th>Jumlah Perangkat</th>
                    <th>Status Pengembalian</th>
                    <th>Tanggal Pengembalian</th>
                     <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @if($pengembalian->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Tidak ada history pengembalian</td>
                </tr>
                    @else
                        @foreach($pengembalian as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                        <!-- Jika ingin menampilkan nama perangkat terkait -->
                        {{ $item->peminjaman->nama_perangkat ?? 'N/A' }}
                    </td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->jumlah_perangkat }}</td>
                            <td>{{ ucfirst($item->status_pengembalian) }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                            <td>
                                <!-- Show Button -->
                              <a href="{{ route('admin.pengembalian.edit', $item->id) }}" class="text-warning mx-1">
                                  <i class="fas fa-edit"></i> Edit
                               </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.pengembalian.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="text-danger mx-1" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) this.closest('form').submit();">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    @endif
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
