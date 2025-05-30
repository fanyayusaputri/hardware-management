<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<li class="nav-heading">Admin</li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('admin.dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
   
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Perangkat</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('admin.rserver.index') }}">
            <i class="bi bi-circle"></i><span>RUANG SERVER</span>
        </a>
    </li>

        <a href="{{ route('admin.lab_sija_1.index') }}">
          <i class="bi bi-circle"></i><span>LAB SIJA 1</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.lab_sija_2.index') }}">
          <i class="bi bi-circle"></i><span>LAB SIJA 2</span>
        </a>
      </li>
      
    </ul>
  </li> 

  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#status-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-question-circle"></i><span>Status Perangkat</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="status-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('admin.pengembalian.home') }}">
                <i class="bi bi-circle"></i><span>Pengembalian</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.peminjaman.index') }}">
                <i class="bi bi-circle"></i><span>Peminjaman</span>
            </a>
        </li>
    </ul>
</li>

  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.rusak') }}">
      <i class="bi bi-question-circle"></i>
      <span>Perangkat Rusak</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

     <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.siswa.index') }}">
      <i class="bi bi-person"></i>
      <span>Siswa</span>
    </a>

    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-envelope"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('admin.laporan.data-siswa') }}">
                <i class="bi bi-circle"></i><span>Data Siswa</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.laporan.data-perangkat') }}">
                <i class="bi bi-circle"></i><span>Data Perangkat</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.laporan.data-peminjaman') }}">
                <i class="bi bi-circle"></i><span>Data Peminjaman Perangkat</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.laporan.data-pengembalian') }}">
                <i class="bi bi-circle"></i><span>Data pengembalian Perangkat</span>
            </a>
        </li>
    </ul>
</li>

  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
    </a>
</li>


      </ul>

</aside><!-- End Sidebar-->