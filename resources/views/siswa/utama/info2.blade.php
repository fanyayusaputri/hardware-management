@extends('siswa.dashboard')

@section('title', 'Detail Info Perangkat | SIMH 69')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Detail Perangkat</h1>
        <div class="card mx-auto" style="max-width: 900px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <div class="row g-0">
                <!-- Gambar Perangkat -->
                <div class="col-md-4">
                @php
                    use Illuminate\Support\Str;

                    $gambarPath = Str::startsWith($perangkat->gambar, 'assets/') 
                        ? asset($perangkat->gambar) 
                        : asset('storage/' . $perangkat->gambar);
                @endphp

                <img 
                    src="{{ $gambarPath }}" 
                    class="card-img-top img-fluid" 
                    alt="{{ $perangkat->nama }}" 
                    style="max-height: 250px; object-fit: cover;">
                </div>

                <!-- Info Perangkat -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary" style="font-size: 1.5rem;">{{ $perangkat->nama }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><strong>Rincian:</strong> {{ $perangkat->deskripsi }}</p>
                                <p class="card-text"><strong>Lokasi:</strong> {{ $perangkat->lokasi }}</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text"><strong>Stok:</strong> {{ $perangkat->stok }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $perangkat->status }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('perangkat') }}" class="btn btn-secondary btn-sm" style="padding: 10px 20px;">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
        /* Gaya untuk Card */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Gaya untuk Gambar */
        .card-img-top {
            border-bottom: 3px solid #007bff;
        }

        /* Gaya untuk Judul */
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        /* Gaya untuk Tombol */
        .btn-secondary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 1rem;
            padding: 10px 20px;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* Gaya untuk Text */
        .card-text {
            font-size: 1rem;
            color: #555;
        }

        /* Margin untuk tombol kembali */
        .mt-4 a {
            text-decoration: none;
        }
    </style>
@endsection
