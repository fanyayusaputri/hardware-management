<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com">
  <title>@yield('title', 'Dashboard | SIMH 69')</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Section for additional custom CSS -->
  @yield('css') <!-- Tempat untuk memuat CSS tambahan yang ditambahkan pada halaman tertentu -->
</head>
<body>
  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="#" class="navbar-brand">SIMH<span class="text" style="color: #23a2f6;">69.</span></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item active"><a href="{{ route('dashboard-siswa') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('perangkat') }}" class="nav-link">Perangkat</a></li>
            <li class="nav-item"><a href="{{ route('siswa.peminjaman.index') }}" class="nav-link">Peminjaman</a></li>
            <li class="nav-item"><a href="{{ route('siswa.pengembalian.index') }}" class="nav-link">Pengembalian</a></li>
            <li class="nav-item"><a href="{{ route('ajukan-kerusakan.create') }}" class="nav-link">Ajukan Kerusakan</a></li>
         
        <!-- Tambahkan Icon Perangkat Rusak & Profil -->
        <li class="nav-item d-flex">
            <a href="{{ route('ajukan-kerusakan.index') }}" class="nav-link">
                <i class="fas fa-tools fa-1x"></i> <!-- Icon Perangkat Rusak -->
            </a>
            <a href="{{ route('profile') }}" class="nav-link">
                <i class="fas fa-user fa-1x"></i> <!-- Icon Profil -->
            </a>
        </li>


          </ul>
        </div>
        <div class="ml-auto">
    <form action="{{ route('logout-siswa') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline rounded-pill">
            <i class="fas fa-sign-out-alt" style="color: #B4B2C5 !important;"></i>
        </button>
    </form>
</div>

      </div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/animateNumber/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/js/google-maps.js') }}"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>
</html>
