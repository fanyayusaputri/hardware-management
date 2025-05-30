
@extends('siswa.dashboard')

@section('title', 'Profil | SIMH 69')

@section('content')
<!-- <div class="container mt-4">
    <h1 class="text-center mb-4">Profil Siswa</h1>

 
    <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-header text-center bg-primary text-white">
            <h3>Data Diri Siswa</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> {{ $siswa->name }}</p>
                    <p><strong>Email:</strong> {{ $siswa->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                    <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-xl-6 col-md-8 col-sm-10 col-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600">Nama:</h6>
                                <p>{{ $siswa->name }}</p>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ $siswa->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Kelas</p>
                                        <h6 class="text-muted f-w-400">{{ $siswa->kelas }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Sekolah</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">NIS:</p>
                                        <h6 class="text-muted f-w-400">{{ $siswa->nis }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Siswa</p>
                                        <h6 class="text-muted f-w-400">SMKN 69 JAKRTA</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('css')
<style>
  body {
    background-color: #f9f9fa;
    
  }

  .padding {
    /* padding: 2rem !important; */
     margin-left: 80px;
  }

  .user-card-full {
    overflow: hidden;
  }

  .card {
    border-radius: 5px;
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px;
   
    
  }

  .m-r-0 {
    margin-right: 0px;
  }

  .m-l-0 {
    margin-left: 0px;
  }

  .user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
  }

  .bg-c-lite-green {
    background: linear-gradient(to bottom, #fff, #23a2f6);
  }

  .user-profile {
    padding: 20px 0;
  }

  .card-block {
    padding: 1.25rem;
  }

  .m-b-25 {
    margin-bottom: 25px;
  }

  .img-radius {
    border-radius: 5px;
  }

  h6 {
    font-size: 14px;
  }

  .card .card-block p {
    line-height: 25px;
  }

  @media only screen and (min-width: 1400px) {
    p {
      font-size: 14px;
    }
  }

  .card-block {
    padding: 1.25rem;
  }

  .b-b-default {
    border-bottom: 1px solid #e0e0e0;
  }

  .m-b-20 {
    margin-bottom: 20px;
  }

  .p-b-5 {
    padding-bottom: 5px !important;
  }

  .card .card-block p {
    line-height: 25px;
  }

  .m-b-10 {
    margin-bottom: 10px;
  }

  .text-muted {
    color: #919aa3 !important;
  }

  .f-w-600 {
    font-weight: 600;
  }

  .m-t-40 {
    margin-top: 20px;
  }

  .user-card-full .social-link li {
    display: inline-block;
  }

  .user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    transition: all 0.3s ease-in-out;
  }

  /* Mobile responsiveness */
  @media (max-width: 768px) {
    .user-card-full .card-block {
      padding: 1rem;
    }

    h6 {
      font-size: 12px;
    }

    .user-card-full .social-link li a {
      font-size: 18px;
    }

    .col-xl-6 {
      max-width: 100%;
    }
  }
</style>
@endsection
