@extends('siswa.dashboard')

@section('title', 'Home | SIMH 69')

@section('content')
<div class="page-banner home-banner d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-lg-row">
      <div class="col-lg-6 text-center text-lg-left py-4">
        <h1 class="mb-3">Sistem Informasi Manajemen Hardware | SIMH69</h1>
        <p class="mb-4 text-lg">Platform manajemen dan peminjaman hardware yang memudahkan siswa dan staf dalam mengelola perangkat teknis dengan sistem yang efisien dan mudah digunakan.</p>

        <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start">
          <a href="{{ route('perangkat') }}" class="btn btn-outline border mb-2 mb-sm-0 mr-sm-3" style="color: #FF9D3D;">Info Perangkat</a>
          <a href="{{ route('pengembalian.create') }}" class="btn btn-custom btn-split d-flex align-items-center justify-content-center">
            Pengembalian perangkat 
            <div class="fab ml-2"><span class="mai-play"></span></div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 py-3 text-center">
        <div class="img-place">
          <img src="{{ asset('assets/img/bg_image_1.png') }}" alt="Dashboard Image" class="img-fluid responsive-img">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  body {
    background-color: #ffffff !important;
  }

  .page-banner {
    min-height: calc(100vh - 60px);
    background-color: #ffffff;
    padding-top: 30px;
    padding-bottom: 30px;
  }

  .btn-custom {
    background-color: #23a2f6;
    border-color: #23a2f6;
    color: #fff;
    transition: 0.3s;
  }

  .btn-custom:hover {
    background-color: #1b87d0;
    border-color: #1b87d0;
  }

  .btn-outline {
    color: #FF9D3D;
    border-color: #FF9D3D;
  }

  .btn-outline:hover {
    background-color: #FF9D3D;
    color: #fff;
  }

  .fab .mai-play {
    color: #23a2f6;
    font-size: 1.2rem;
  }

  .img-place img.responsive-img {
    max-width: 100%;
    height: auto;
    object-fit: contain;
    border-radius: 8px;
  }

  @media (max-width: 767.98px) {
    .page-banner h1 {
      font-size: 1.6rem;
    }

    .page-banner p {
      font-size: 0.95rem;
    }

    .btn {
      font-size: 0.9rem;
      padding: 0.5rem 1rem;
    }

    .img-place {
      padding: 10px;
    }

    .img-place img.responsive-img {
      max-height: 250px;
    }
  }
</style>
@endsection
