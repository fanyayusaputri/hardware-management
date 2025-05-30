@extends('layouts.admin')

@section('page-title', 'Data Siswa SMKN 69 Jakarta')
@section('breadcrumb', 'Data Siswa SMKN 69 Jakarta')

@section('main')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->kelas }}</td>
                                    <td>
                                         <!-- <a href="#" class="">Hapus</a> -->
                                         <form action="{{ route('admin.siswa.hapus', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<style>
    .table {
        margin-top: 20px;
    }

    .btn-sm {
        margin-right: 5px;
    }
</style>
@endsection
