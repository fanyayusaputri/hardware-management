@extends('siswa.dashboard')

@section('title', 'Perangkat | SIMH 69')
@section('content')

<div class="container mt-5">
    <div id="product-cards">
        <h2 class=" mb-4">PERANGKAT SMKN 69 JKT</h2>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
            @foreach ($perangkat as $item)
                <div class="col mb-4">
                    <div class="card fixed-card">
                        <div class="overlay">
                            <!-- <button type="button" class="btn btn-secondary" title="Quick View"><i class="fas fa-eye"></i></button> -->
                        </div>
                         @php
                            $imgSrc = \Illuminate\Support\Str::startsWith($item->gambar, ['http://', 'https://', 'assets/', 'storage/'])
                                ? asset($item->gambar)
                                : asset('storage/' . $item->gambar);
                        @endphp


                        <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" class="card-img-top">

                        
                        <div class="card-body">
                            <h3>{{ $item->nama }}</h3>
                            <p>Status: {{ $item->status }}</p>
                            <p>Stok: {{ $item->stok }}</p>
                           <a href="{{ route('peminjaman.create', ['id' => $item->id, 'nama_perangkat' => $item->nama]) }}" class="btn btn-primary">Pinjam</a>
                            <a href="{{ route('info', ['id' => $item->id]) }}">
                            <i class="fas fa-exclamation-circle"></i> Info
                            </a>

                          </div>
                    </div>
                </div>
            @endforeach

            @foreach ($perangkat1 as $item)
                <div class="col mb-4">
                    <div class="card fixed-card">
                        <div class="overlay"></div>
                        @php
                            $imgSrc = \Illuminate\Support\Str::startsWith($item->gambar, ['http://', 'https://', 'assets/', 'storage/'])
                                ? asset($item->gambar)
                                : asset('storage/' . $item->gambar);
                        @endphp


                        <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" class="card-img-top">

                        <div class="card-body">
                        
                            <h3>{{ $item->nama }}</h3>
                            <p>Status: {{ $item->status }}</p>
                            <p>Stoik: {{ $item->stok }}</p>
                           <a href="{{ route('peminjaman.create', ['id' => $item->id, 'nama_perangkat' => $item->nama]) }}" class="btn btn-primary">Pinjam</a>
                           <a href="{{ route('infoperangkatlab1', ['id' => $item->id]) }}">
                            <i class="fas fa-exclamation-circle"></i> Info
                            </a>
                          </div>
                    </div>
                </div>
            @endforeach

            @foreach ($perangkat2 as $item)
                <div class="col mb-4">
                    <div class="card fixed-card">
                        <div class="overlay"></div>
                        @php
                            $imgSrc = \Illuminate\Support\Str::startsWith($item->gambar, ['http://', 'https://', 'assets/', 'storage/'])
                                ? asset($item->gambar)
                                : asset('storage/' . $item->gambar);
                        @endphp


                        <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" class="card-img-top">

                        <div class="card-body">
                            <h3>{{ $item->nama }}</h3>
                            <p>Status: {{ $item->status }}</p>
                            <p>Stoik: {{ $item->stok }}</p>
                           <a href="{{ route('peminjaman.create', ['id' => $item->id, 'nama_perangkat' => $item->nama]) }}" class="btn btn-primary">Pinjam</a>
                           <a href="{{ route('infoperangkatlab2', ['id' => $item->id]) }}">
                            <i class="fas fa-exclamation-circle"></i> Info
                            </a>
                          </div>
                    </div>
                </div>
            @endforeach

            @if ($perangkat->isEmpty() && $perangkat1->isEmpty() && $perangkat2->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        Data Products belum tersedia.
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection


@section('css')
<style>
  /* Product cards */
/* Container untuk kartu produk */
#product-cards {
    margin-top: 50px;
}

#product-cards h2 {
    /* text-align: center; */
    /* font-weight: bold; */
    color: #23a2f6;
    text-shadow: 2px 2px 2px black;
    border-bottom: 2px solid rgba(161, 109, 14, 1);
    margin-top: 100px;
}

/* Kartu produk */
#product-cards .card {
    background-color: rgba(93, 71, 235, 0.13);
    box-shadow: 0px 9px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#product-cards .card:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

/* Gambar pada kartu */
#product-cards .card img {
    width: 100%;
    height: 100%;
    transition: transform 0.3s ease;
}

/* Overlay untuk informasi tambahan */
#product-cards .card .card-body {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 10px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
    text-align: center;
    border-radius: 0 0 8px 8px;
}

#product-cards .card:hover .card-body {
    transform: translateY(0);
}

/* Judul produk */
#product-cards h3 {
    color: #FFF;
    font-size: 1.1rem;
    text-shadow: 1px 1px 1px black;
    margin: 10px 0;
}


#product-cards i{
  color: #FFF;
  
}

#product-cards a{
  color: #FFF;
  
}
/* 
/* Informasi stok */
#product-cards p {
    font-size: 12px;
    color: #FF9D3D;
    font-weight: bold;
    margin-bottom: 3px;
}

/* Tombol Pinjam */

#product-cards .btn{
  color: #23a2f6;
}
#product-cards .btn-primary {
    background-color: #FFF;
    border: none;
    transition: background-color 0.3s ease;
    border-radius: 0.8rem;
    padding: 5px 20px;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    
} 

#product-cards .btn-primary:hover {
    background-color: #FDBF60;
    border-radius: 1rem;
    color: #FFF;
}

/* Responsive styling for product cards */
@media (max-width: 767px) {
    #product-cards .card {
        flex-direction: column;
        justify-content: flex-start;
    }
}


</style>
@endsection
