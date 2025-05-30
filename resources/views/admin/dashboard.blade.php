@extends('layouts.admin')

@section('main')
<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Pengembalian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-in-left"></i>
                    </div>
                    <div class="ps-3">
                    <h6>{{ $totalPengembalian }}</h6>
                          <span class="text-success small pt-1 fw-bold"></span> 
                          <span class="text-muted small pt-2 ps-1">Pengembalian</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Peminjaman</span></h5>

                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-calendar-check"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $totalPeminjaman }}</h6>
                          <span class="text-success small pt-1 fw-bold"></span> 
                          <span class="text-muted small pt-2 ps-1">Peminjaman</span>
                      </div>
                  </div>
              </div>


              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total  <span>| Perangkat</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-pc-display"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalPerangkat }}</h6>
                      <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">Perangkat</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <!-- <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                 
                  <div id="reportsChart"></div>

               
             

                </div>

              </div>
            </div> -->

            <!-- Recent Sales -->
            <div class="col-12">
            <div class="card recent-sales overflow-auto">
                
                <!-- Filter -->
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Recent Peminjaman <span>| Perangkat</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col">Nama Perangkat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                            
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamans as $peminjaman)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $peminjaman->nama }}</td>
                                <td>{{ $peminjaman->kelas }}</td>
                                <td>{{ $peminjaman->no_telepon }}</td>
                                <td>{{ $peminjaman->nama_perangkat }}</td>
                                <td>{{ $peminjaman->jumlah_perangkat }}</td>
                                <td>{{ $peminjaman->persetujuan }}</td>
                             
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Recent Pengembalian<span>| Perangkat</span></h5>

                  <table class="table table-borderless datatable">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Perangkat</th>
                    <th scope="col">Kelas</th>
                    <!-- <th scope="col">Jumlah Perangkat</th> -->
                    <th scope="col">Status Pengembalian</th>
                    <th scope="col">Tanggal Pengembalian</th>
                   
                    </tr>
                </thead>

                <tbody>
                @foreach($pengembalian as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                        <!-- Jika ingin menampilkan nama perangkat terkait -->
                        {{ $item->peminjaman->nama_perangkat ?? 'N/A' }}
                    </td>
                            <td>{{ $item->kelas }}</td>
                            <!-- <td>{{ $item->jumlah_perangkat }}</td> -->
                            <td>{{ ucfirst($item->status_pengembalian) }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                         
                        </tr>
                    @endforeach
                        </tbody>
            </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <!-- <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div>

              </div>

            </div>
          </div>End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body pb-0">
              <h5 class="card-title">Grafik Data <span>| Perangkat </span></h5>

           <div id="dataChart" style="width: 100%; min-height: 400px;"></div>

           <script>
              document.addEventListener("DOMContentLoaded", () => {
                  var chartElement = document.querySelector("#dataChart");

                  if (!chartElement) {
                      console.error("Elemen #dataChart tidak ditemukan!");
                      return;
                  }

                  var dataChart = echarts.init(chartElement);

                  var option = {
                      title: { text: 'Statistik Data Perangkat', left: 'center' },
                      tooltip: { trigger: 'axis' },
                      xAxis: {
                          type: 'category',
                          data: ['Peminjaman', 'Pengembalian', 'Perangkat'],
                          axisLabel: { interval: 0, rotate: 0, fontSize: 10 }
                      },
                      yAxis: { type: 'value' },
                      series: [{
                          name: 'Jumlah',
                          type: 'bar',
                          data: [
                              @json($totalPeminjaman ?? 0),
                              @json($totalPengembalian ?? 0),
                              @json($totalPerangkat ?? 0)
                          ],
                          itemStyle: { color: '#007bff' },
                          barWidth: '50%'
                      }]
                  };

                  dataChart.setOption(option);
              });
          </script>

          </div>

          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
                  <h5 class="card-title">Statistik Perangkat <span>| Peminjaman & Pengembalian</span></h5>

                  <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

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
                                  name: 'Jumlah Perangkat',
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
                                  data: [
                                      {
                                          value: {{ $totalPerangkatDipinjam ?? 0 }},
                                          name: 'Dipinjam'
                                      },
                                      {
                                          value: {{ $totalPerangkatDikembalikan ?? 0 }},
                                          name: 'Dikembalikan'
                                      }
                                  ]
                              }]
                          });
                      });
                  </script>
              </div>

          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>
@endsection

@section('css')
@endsection

@section('js')

@endsection

@section('script')
<script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
@endsection