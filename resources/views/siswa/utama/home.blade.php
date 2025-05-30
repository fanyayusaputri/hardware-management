@extends('siswa.dashboard')

@section('title', 'Home | SIMH 69')

@section('content')
<div class="page-banner home-banner" >
  <div class="container h-100">
    <div class="row align-items-center h-100">
      <div class="col-lg-6 py-3 wow fadeInUp">
        <h1 class="mb-4">Sistem Informasi Manajemen Hardware | SIMH69</h1>
        <p class="text-lg mb-5">Platform manajemen dan peminjaman hardware yang memudahkan siswa dan staf dalam mengelola perangkat teknis. Dengan sistem yang efisien dan mudah digunakan.</p>
        <a href="{{ route('perangkat') }}" class="btn btn-outline border " style="color: #FF9D3D;">Info Perangkat</a>

        <a href="{{ route('pengembalian.create') }}" class="btn btn-custom btn-split ml-2">Pengembalian perangkat <div class="fab"><span class="mai-play"></span></div></a>

      </div>
      <div class="col-lg-6 py-3 wow zoomIn">
        <div class="img-place">
          <img src="{{ asset('assets/img/bg_image_1.png') }}" alt="Dashboard Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('css')
<style>
  /* Menyesuaikan tinggi page-banner agar pas dengan layar desktop */
  .page-banner {
    height: calc(100vh - 60px); /* Sesuaikan dengan tinggi navbar */
    display: flex;
    align-items: center;
    background-color: #E8F9FF;
  }
  
  /* Mengatur gambar agar responsif */
  .page-banner .img-place img {
    width: 100%;
    height: auto;
  }

  .btn-custom {
    background-color: #23a2f6;
    border-color: #23a2f6;
    color:#fff;
  }

  .btn-outline{
    color:#FFF6B3;
  }

  .mai-play{
    color:#23a2f6;
  }


  /* Responsif untuk tampilan kecil */
  @media (max-width: 768px) {
    .page-banner {
      height: auto; /* Untuk layar kecil, biarkan tinggi disesuaikan dengan konten */
      padding: 20px 0; /* Menambahkan padding untuk layar kecil */
    }

    .page-banner h1 {
      font-size: 1.8rem; /* Menyesuaikan ukuran font untuk tampilan kecil */
    }

    .page-banner p {
      font-size: 1rem; /* Menyesuaikan ukuran font untuk tampilan kecil */
    }

    .page-banner .btn {
      font-size: 0.9rem; /* Menyesuaikan ukuran tombol */
    }
  }
</style>
@endsection
